<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class ImportActivityClass  implements WithMultipleSheets
{
    //
    use WithConditionalSheets;

    public function conditionalSheets(): array
    {
        return [
            'SHELTER' => new ActivityClass,
            'WASH' => new ActivityClass,
            'EiE' => new ActivityClass,
            'SAN' => new ActivityClass,
            'SALUD' => new ActivityClass,
            'PROTECCIÓN' => new ActivityClass
        ];
    }
}
