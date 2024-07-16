<?php

namespace App\Http\Controllers;

use App\Data\SubmissionData;
use App\Http\Requests\SaveSubmissionRequest;
use App\Jobs\SaveSubmissionJob;
use OpenApi\Attributes as OA;

class SubmissionController extends Controller
{
    #[OA\Post(
        path: '/api/submit',
        operationId: 'SubmissionsSave',
        summary: 'Submit',
        tags: ['Submissions']
    )]
    #[OA\RequestBody(required: true, content: new OA\JsonContent(type: SaveSubmissionRequest::class))]
    #[OA\Response(response: '201', description: 'success')]
    public function save(SaveSubmissionRequest $request)
    {
        SaveSubmissionJob::dispatch(
            new SubmissionData(
                name: $request->validated('name'),
                email: $request->validated('email'),
                message: $request->validated('message'),
            )
        );

        return response()->json(status: 201);
    }
}
