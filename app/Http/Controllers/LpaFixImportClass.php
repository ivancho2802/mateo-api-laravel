<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class LpaFixImportClass implements WithMultipleSheets
{
    use WithConditionalSheets;
    
    public function conditionalSheets(): array
    {
        return [
            'discapacitados' => new LpaFixClass,
        ];
    }
}