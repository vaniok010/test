<?php

namespace App\Data;

class SubmissionData
{
    public function __construct(
        public string $name,
        public string $email,
        public string $message,
    )
    {
    }
}
