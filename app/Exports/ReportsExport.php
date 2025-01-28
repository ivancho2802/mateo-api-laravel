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

    $reports = Reports::all();

    $reports_keys = collect($reports->first());

    $reports_keys_new = $reports_keys->mapWithKeys(function ($report, $key) {
      return [$key => $key];
    });

    $reportsCollect = collect($reports);
    
    $reportsCollect->push(($reports_keys_new));
    dd("ReportsExport", $reportsCollect[count($reportsCollect) -1 ]);

    $reportsCollectRevert = $reportsCollect->reverse();

    $reportsCollectAll = $reportsCollectRevert->all();

    return $reportsCollectAll;
  }
}
