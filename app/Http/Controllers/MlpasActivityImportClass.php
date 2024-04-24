<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class MlpasActivityImportClass implements WithMultipleSheets
{
    //
    use WithConditionalSheets;
    
    public function conditionalSheets(): array
    {
        return [
            'DIRECTORIO' => new MlpasActivityClass,
        ];
    }
}
