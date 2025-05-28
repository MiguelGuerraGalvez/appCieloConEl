<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Una lista de inputs que nunca se deben almacenar en la sesión durante la validación.
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Registra las callbacks para el manejo de excepciones.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            // Puedes dejarlo vacío o poner lógica de logs personalizada aquí
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }

        return parent::render($request, $exception);
    }
}
