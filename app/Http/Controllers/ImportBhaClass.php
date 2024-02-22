<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class ImportBhaClass implements WithMultipleSheets
{
    use WithConditionalSheets;

    public function conditionalSheets(): array
    {
        return [
            'Matriz BHA' => new BhaClass,
        ];
    }
}