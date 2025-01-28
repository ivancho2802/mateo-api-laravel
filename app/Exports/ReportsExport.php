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

    $reports = Reports::get();

    $reports_keys = collect($reports->first());

    $reports_keys_new = $reports_keys->mapWithKeys(function ($report, $key) {
      return [$key => $key];
    });

    $reports->push(collect($reports_keys_new));
    
    $reportsCollectRevert = $reports->reverse();
    
    //dd("reportsCollectAll", $reportsCollectAll);

    return $reportsCollectRevert->all();
  }
}
