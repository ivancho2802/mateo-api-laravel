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
    //dd("ReportsExport", Reports::all());

    $reports = Reports::all();

    $reports_keys = $reports->first();

    $reports_keys_new = $reports_keys->map(function ($report, $key) {
      $report[$key] = $key;
      return $report;
    });

    dd("excel report", $reports_keys, $reports_keys_new);

    $reports->push([
      "id" => 35,
      "created_at" => "2024-06-17 13:41:55",
      "updated_at" => "2024-06-17 13:41:55",
      "year" => "2024",
      "codigo_emergencia" => "BONO-981.1",
      "departamento" => "Bolívar",
      "municipio" => "Norosí",
      "tipo_emergencia" => "Desplazamiento masivo",
      "fecha_ern" => "2024-02-15 00:00:00",
      "links" => "https://reliefweb.int/report/colombia/evaluacion-rapida-de-necesidades-ern-norosi-bolivar-15022024,https://reliefweb.int/report/colombia/colombia-ficha-de-cierre-de-emergencias-fce-norosi-bolivar-05032024",
      "ID_M_USUARIOS" => 1,
      "tipo_respuesta" => "Respuesta Rapida",
      "tipo_producto" => "ERN,FCE",
    ]);

    return $reports;
  }
}
