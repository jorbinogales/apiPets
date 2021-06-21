<?php

namespace App\Exceptions;

use App\Utils\ApiResponser;
use App\Utils\CodeResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Throwable;

class Handler extends ExceptionHandler
{

    use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function report(Throwable $e)
    {
        parent::report($e);
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException && $request->ajax()) {
            return $this->errorResponse(CodeResponse::DATA_NOT_FOUND, 404);
        }
        if ($exception instanceof QueryException) {
            if ($exception->errorInfo[1] == '1451') {
                /* You cannot delete this data as it is related to other */
                return $this->errorResponse(CodeResponse::RELATED_MODEL, 422);
            }
            if ($exception->errorInfo[1] == '1062') {
                /* Duplicate entry */
                return $this->errorResponse(CodeResponse::DUPLICATE_ENTRY, 422);
            }
        }
        if ($exception instanceof AuthenticationException && $request->ajax()) {
            return $this->errorResponse(CodeResponse::TOKEN_EXPIRED, 401);
        }
        if ($exception instanceof ValidationException) {
            /* The data provided is not valid. */
            return response()->json(['code' => CodeResponse::BAD_REQUEST, 'errors' => $exception->validator->getMessageBag()], 400);
        }

        if ($exception instanceof UnauthorizedException) {
            /* You do not have the necessary permissions / roles to access the service. */
            return $this->errorResponse(CodeResponse::FORBIDDEN, 403);
        }


        return parent::render($request, $exception);
    }
}
