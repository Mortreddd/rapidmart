<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Support\Facades\Log;

class ExpiredTokenException extends Exception
{
    public function __construct()
    {
        parent::__construct('Token has expired.');
    }

    public function report(Throwable $exception)
    {
        Log::error($exception->getMessage());
    }
}