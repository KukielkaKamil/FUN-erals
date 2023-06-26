<?php

namespace App\Exceptions;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            Log::channel('stderr')->error($e->getMessage());
        });

        $this->renderable(function (QueryException $e, $request) {

            //return response()->view('errors.invalid-order', [], 400);

            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1451') {
                return back()->withError('You cannot delete this record, because there are child records');
            } else {
                return back()->withError(print_r($e->errorInfo, true))->withInput();
            }

            return back()->withError($e->getMessage())->withInput();
        });
    }
}
