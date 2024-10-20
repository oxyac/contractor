<?php

namespace App\Jobs;

use App\Http\Requests\PromptRequest;
use App\Models\Contract;
use App\Services\GenerateService;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;
use PhpOffice\PhpWord\PhpWord;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\Mime\MimeTypes;

class ParseContracts implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Contract $contract)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $result = null;

        try {
            $this->storeTemporaryFile();
            $prompt =
                'Please analyze the provided contract text and extract the relevant data to fill the following JSON structure (if you doesn’t find data set null). Ensure to capture details for both companies, contract terms, services, bank details, notes, and invoice information. Structure the response in a stable, typed JSON format, following the schema provided. Creating the invoices take care about the dueDate which is the last date when the invoice can be payed. Inside Invoice if there is no a date specified in contract for createdAt then all data in invoices should consider that the createdAt is the current date. Note that the totalPrice in invoices should be the total for current service/product so it should be equal to: productQuantity * productPrice.
{
   "companies":{
      "from":{
         "id":1,
         "name":"Service Provider Inc.",
         "entity_type":"Corporation",
         "email":"contact@serviceprovider.com",
         "phone":"+1234567890",
         "address":"123 Service St, Business City, BC"
      },
      "to":{
         "id":2,
         "name":"Client Corp.",
         "entity_type":"Corporation",
         "email":"info@clientcorp.com",
         "phone":"+0987654321",
         "address":"456 Client Ave, Client Town, CT"
      }
   },
   "contract":{
      "id":1,
      "from_company_id":1,
      "to_company_id":2,
      "currency":"USD",
      "language_code":"EN",
      "contract_date":"2024-09-29",
      "contract_start_date":"2024-10-01",
      "contract_due_date":"2025-10-01",
      "total":1500.00,
      "limited":false
   },
   "services":[
      {
         "id":1,
         "contract_id":1,
         "description":"Web Development Services",
         "quantity":1,
         "price":1500.00
      }
   ],
   "bank_details":{
      "company_id":1,
      "bank_details":"Bank of Services, Account No: 123456789, Sort Code: 12-34-56"
   },
   "notes":[
      {
         "id":1,
         "contract_id":1,
         "note":"Payment due within 30 days of invoice."
      }
   ],
   "invoices":[
      {
         "CreatedAt":"2024-09-29",
         "dueDate":"2025-10-01",
         "productDescription":"Web Development Services",
         "productQuantity":1,
         "productPrice":1500.00,
         "totalPrice":1500.00
      }
   ]
}';

            $text = $this->extractText();
            $prompt .= $text;

            $result = OpenAI::chat()->create([
                'model' => 'gpt-4o',
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);

            $response = json_decode($result->choices[0]->message->content, true);
            $this->contract->update([
                'parse_result' => $response,
                'is_parsed' => true
            ]);

            if ($response) {

                (new GenerateService())->generateFromResponse($this->contract, $response);

                Notification::make()
                    ->title('Contract has been generated.')
                    ->color('success')
                    ->send();

            } else {
                Log::error('Error parsing contract.', ['result' => $result]);
            }
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error parsing contract.')
                ->color('danger')
                ->send();
            Log::error('Error parsing contract.', ['result' => $result]);

            throw $e;
        }

    }

    private function extractText(): string
    {
        $text = '';
        $media = $this->contract->getFirstMedia();
        $path = Storage::disk('temporary')->path($this->contract->id);

        if ($media->mime_type === 'application/pdf') {
            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseFile($path);

            $text = $pdf->getText();
        } elseif ($media->mime_type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
            $objReader = \PhpOffice\PhpWord\IOFactory::createReader();
            $phpWord = $objReader->load($path); // instance of \PhpOffice\PhpWord\PhpWord
            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                        foreach ($element->getElements() as $textElement) {
                            if ($textElement instanceof \PhpOffice\PhpWord\Element\Text) {
                                $text .= $textElement->getText();
                            }
                        }
                    } else if ($element instanceof \PhpOffice\PhpWord\Element\Text) {
                        $text .= $element->getText();
                    }
                    // and so on for other element types (see src/PhpWord/Element)
                }
            }
        }

        $this->contract->update([
            'text' => $text
        ]);

        return $text;
    }

    private function storeTemporaryFile(): bool
    {
        $s3_file = Storage::disk('s3')->get($this->contract->getFirstMedia()->getPath());
        $localStorage = Storage::disk('temporary');
        $localStorage->put($this->contract->id, $s3_file);

        return $localStorage->exists($this->contract->id);
    }
}
