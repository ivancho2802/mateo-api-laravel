<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Importa la Facade

class PdfController extends Controller
{
    public function descargarMiPaginaPdf()
    {
        $data = [
            'nombre' => 'Usuario de Ejemplo',
            'fecha' => date('Y-m-d H:i:s')
        ];

        // Carga la vista Blade y pasa los datos
        $pdf = Pdf::loadView('pdf.mi_pagina', $data);

        // Puedes elegir entre:
        // 1. Descargar el PDF directamente:
        return $pdf->download('mi_pagina.pdf');

        // 2. Mostrar el PDF en el navegador (stream):
        // return $pdf->stream('mi_pagina.pdf');

        // 3. Guardar el PDF en el disco (storage/app):
        // $content = $pdf->output();
        // \Storage::disk('local')->put('mi_pagina_guardada.pdf', $content);
        // return "PDF guardado exitosamente.";
    }
}