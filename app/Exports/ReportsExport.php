<?php

namespace App\Exports;

use App\Models\Reports;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        dd("ReportsExport", Reports::all());

        return Reports::all();
    }
}
