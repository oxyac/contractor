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
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ParseContracts
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
        try {
            $result = (new PromptRequest($this->contract->getFirstMedia()->getPath()))->send()->json();

            $this->contract->update([
                'parse_result' => $result,
                'is_parsed' => true
            ]);

            if (isset($result['result'])) {

                (new GenerateService())->generateFromResponse($this->contract, $result['result']);

                Notification::make()
                    ->title('Contract has been generated.')
                    ->color('success')
                    ->send();

            } else {
                Log::error('Error parsing contract.', $result);
            }
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error parsing contract.')
                ->color('danger')
                ->send();

            throw $e;
        }

    }
}
