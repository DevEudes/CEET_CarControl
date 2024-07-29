<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    // ...

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AuthorizationException || $exception instanceof HttpException && $exception->getStatusCode() == 403) {
            return response()->view('errors.403', [], 403);
        }

        return parent::render($request, $exception);
    }
}
