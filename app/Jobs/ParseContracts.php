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
    public function __construct(public Contract $contract)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

    }
}
