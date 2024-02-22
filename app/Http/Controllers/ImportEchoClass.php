<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class ImportEchoClass  implements WithMultipleSheets
{
    use WithConditionalSheets;
    //

    public function conditionalSheets(): array
    {
        return [
            'Matriz ECHO' => new EchoClass,
        ];
    }
}
