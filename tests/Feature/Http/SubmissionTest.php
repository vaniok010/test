<?php

namespace Http;

use App\Jobs\SaveSubmissionJob;
use App\Models\Submission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class SubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_dispatches_submission(): void
    {
        Queue::fake();

        $submission = Submission::factory()->makeOne();

        $response = $this->postJson('/api/submit', [
            'name' => $submission->name,
            'email' => $submission->email,
            'message' => $submission->message,
        ]);

        $response->assertCreated();

        Queue::assertPushed(SaveSubmissionJob::class);
    }

    public function test_it_validates_fields(): void
    {
        $this->postJson('/api/submit')
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name', 'email', 'message']);
    }
}
