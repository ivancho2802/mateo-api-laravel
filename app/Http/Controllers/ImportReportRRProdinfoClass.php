<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class ImportReportRRProdinfoClass implements WithMultipleSheets
{
    //
    use WithConditionalSheets;

    public function conditionalSheets(): array
    {
        return [
            'Productos de Información' => new ReportRRProdinfoClass,
        ];
    }
}
