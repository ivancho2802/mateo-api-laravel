<?php

namespace App\Exceptions;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Session\TokenMismatchException;
use Throwable;

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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Cuando el usuario ya no está autenticado.
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        /*
         * Solicitud AJAX / Axios / Fetch
         */
        if ($request->expectsJson()) {
            return response()->json([
                'status' => false,
                'message' => 'Tu sesión ha expirado. Debes iniciar sesión nuevamente.',
                'redirect' => route('login'),
            ], 401);
        }

        /*
         * Navegación normal del navegador.
         *
         * redirect()->guest() guarda automáticamente
         * la URL como url.intended.
         */
        return redirect()
            ->guest(route('login'))
            ->with(
                'warning',
                'Tu sesión ha expirado. Debes iniciar sesión nuevamente.'
            );
    }

    public function render($request, Throwable $exception)
    {
        /*
         * Cuando el CSRF deja de ser válido porque
         * la sesión expiró.
         */
        if ($exception instanceof TokenMismatchException) {

            /*
             * Para POST normalmente queremos regresar
             * a la página que tenía el formulario,
             * no ejecutar automáticamente el POST.
             */
            $returnUrl = url()->previous();

            /*
             * Guardamos los datos temporalmente para
             * recuperarlos después del login.
             */
            $request->session()->put('pending_request', [
                'url' => $returnUrl,

                'input' => $request->except([
                    '_token',
                    'password',
                    'password_confirmation',
                ]),
            ]);

            /*
             * AJAX / Axios / Fetch
             */
            if ($request->expectsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Tu sesión ha expirado. Debes iniciar sesión nuevamente.',
                    'redirect' => route('login'),
                ], 419);
            }

            /*
             * Solicitud HTML tradicional
             */
            return redirect()
                ->route('login')
                ->with(
                    'warning',
                    'Tu sesión ha expirado. Debes iniciar sesión nuevamente.'
                );
        }

        return parent::render($request, $exception);
    }
}
