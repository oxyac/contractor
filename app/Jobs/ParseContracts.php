<?php

namespace App\Jobs;

use App\Models\Contract;
use App\Models\Vision;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ParseContracts implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Vision $vision)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->vision->getMedia() as $media) {
            $contract = new Contract();
            $contract->save();

            /* @var Media $media */
            $contract->addMedia($media);

            Storage::disk('local')->delete($media->getPath());
            $media->delete();

        }

        Log::info('Parsing contract for vision ' . $this->vision->id, [
            'images' => $this->vision->getMedia(),
        ]);
    }
}
