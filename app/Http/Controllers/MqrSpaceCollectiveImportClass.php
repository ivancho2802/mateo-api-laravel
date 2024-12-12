<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class MqrSpaceCollectiveImportClass implements WithMultipleSheets
{
    use WithConditionalSheets;
    
    public function conditionalSheets(): array
    {
        return [
            'Espacios colectivos' => new MqrSpaceCollectClass,
        ];
    }
}
