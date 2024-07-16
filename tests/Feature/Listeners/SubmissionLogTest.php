<?php

namespace Listeners;

use App\Events\SubmissionSaved;
use App\Listeners\SubmissionLog;
use App\Models\Submission;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class SubmissionLogTest extends TestCase
{
    public function test_it_logs_data(): void
    {
        $submission = Submission::factory()->createOne();

        Log::shouldReceive('info')
            ->once()
            ->with("Submission saved with name: $submission->name and email: $submission->email");

        (new SubmissionLog())->handle(new SubmissionSaved($submission));
    }
}
