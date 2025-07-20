<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class ImportReportClass implements WithMultipleSheets
{
    //
    use WithConditionalSheets;

    public function conditionalSheets(): array
    {
        return [
            'Emergencias 2023' => new ReportClass,
        ];
    }
}
