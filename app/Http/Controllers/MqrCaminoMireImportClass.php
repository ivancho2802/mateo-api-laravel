<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class MqrCaminoMireImportClass implements WithMultipleSheets
{
    use WithConditionalSheets;
    
    public function conditionalSheets(): array
    {
        return [
            'Camino MIRE+' => new MqrCaminoMireClass,
        ];
    }
}
