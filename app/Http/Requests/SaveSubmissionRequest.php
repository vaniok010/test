<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(required: [
    'name',
    'email',
    'message',
])]
class SaveSubmissionRequest extends FormRequest
{
    #[OA\Property(property: 'name', type: 'string', default: 'John Doe')]
    #[OA\Property(property: 'email', type: 'string', default: 'john.doe@example.com')]
    #[OA\Property(property: 'message', type: 'string', default: 'This is a test message.')]
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:50',
            ],
            'email' => [
                'required',
                'string',
                'max:50',
                'email',
            ],
            'message' => [
                'required',
                'string',
                'max:1000',
            ],
        ];
    }
}
