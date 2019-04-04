<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
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
     * Report or log an exception.
     *
     * @param  \Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

// Можно возвращать кастомный ответ если не аутентифицирован
//    /**
//     * Convert an authentication exception into a response.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \Illuminate\Auth\AuthenticationException  $exception
//     * @return \Illuminate\Http\Response
//     */
//    protected function unauthenticated($request, AuthenticationException $exception)
//    {
//        return $request->expectsJson()
//            ? response()->json(['message' => $exception->getMessage()], 401)
//            : redirect()->guest($exception->redirectTo() ?? route('login'));
//    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);

        // TODO Настроить! Код взял отсюда https://stackoverflow.com/a/43246463/5286034
//        $exception = $this->prepareException($exception);
//
//        if ($exception instanceof \Illuminate\Http\Exception\HttpResponseException) {
//            return $exception->getResponse();
//        }
////        if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
////            return $this->unauthenticated($request, $exception);
////        }
////        if ($exception instanceof \Illuminate\Validation\ValidationException) {
////            return $this->convertValidationExceptionToResponse($exception, $request);
////        }
//
//        $response = [];
//
//        $statusCode = 500;
//        if (method_exists($exception, 'getStatusCode')) {
//            $statusCode = $exception->getStatusCode();
//        }
//
//        switch ($statusCode) {
////            case 404:
////                $response['error'] = 'Not Found';
////                break;
////
//            case 403:
//                $response['error'] = 'Forbidden';
//                break;
//
//            default:
//                $response['error'] = $exception->getMessage();
//                break;
//        }
//
//        if (config('app.debug')) {
//            $response['trace'] = $exception->getTrace();
//            $response['code'] = $exception->getCode();
//        }
//
//        return response()->json($response, $statusCode);
    }
}
