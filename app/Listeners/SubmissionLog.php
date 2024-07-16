<?php

namespace App\Listeners;

use App\Events\SubmissionSaved;
use Illuminate\Support\Facades\Log;

class SubmissionLog
{
    public function handle(SubmissionSaved $event): void
    {
        Log::info("Submission saved with name: {$event->submission->name} and email: {$event->submission->email}");
    }
}
