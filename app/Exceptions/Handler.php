<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    // ... (other methods and properties)

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable               $exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {


        if ($exception instanceof ModelNotFoundException) {
             return response()->json([
                'error' => 'Resource not found.',
                'message' => $exception->getMessage(),
            ], 404);     }




        if ($exception instanceof ValidationException) {
            return response()->json([
                'error'   => 'Validation failed',
                'message' => $exception->getMessage(),
                'errors'  => $exception->errors(),
            ], 422);
        }

        // You can add more conditions for other exceptions and customize the response accordingly.

        // If it's not a specific exception, let the parent class handle it
        return parent::render($request, $exception);
    }


}
