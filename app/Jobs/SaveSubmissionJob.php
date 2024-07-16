<?php

namespace App\Jobs;

use App\Data\SubmissionData;
use App\Models\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveSubmissionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(protected SubmissionData $data)
    {
    }

    public function handle(): void
    {
        Submission::query()
            ->create([
                'name' => $this->data->name,
                'email' => $this->data->email,
                'message' => $this->data->message,
            ]);
    }
}
