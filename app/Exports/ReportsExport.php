<?php

namespace App\Exports;

use App\Models\Reports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class ReportsExport implements FromCollection
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {

    //Reports::except(['created_at', 'updated_at'])
    $repostsOrderd = DB::table('reports')
    ->select(
      'tipo_respuesta as Tipo_de_Respuesta',
      'tipo_producto as Tipo_de_producto',
      'codigo_emergencia as Codigo',
      'departamento as Departamento',
      'municipio as Municipio',
      'fecha_ern as Fecha_de_Elaboracion',
      'year as Año',
      'links as Enlace',
      'tipo_emergencia as Tipo_de_emergencia'
    )
    ->orderBy('Fecha_de_Elaboracion', 'desc');

    $reports = $repostsOrderd->all();

    /* $reports_keys = collect($reports->first());

    $reports_keys_new = $reports_keys->mapWithKeys(function ($report, $key) {
      return [$key => $key];
    });

    $reportsCollect = collect($reports);

    $reportsCollect->push(collect($reports_keys_new)->all());
    
    $reportsCollectRevert = $reportsCollect->reverse(); */
    
    //dd("reportsCollectAll", $reportsCollectRevert->all());

    return $reports;
  }
}
