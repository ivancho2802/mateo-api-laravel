<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class MqrImportClass implements WithMultipleSheets
{
    use WithConditionalSheets;
    
    public function conditionalSheets(): array
    {
        return [
            '1. REPORTE CUANTITATIVO' => new MqrClass,
        ];
    }
}
