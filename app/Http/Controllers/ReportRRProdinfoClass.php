<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;
use App\Models\migrateCustom;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Cell;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Row;

class ReportRRProdinfoClass implements OnEachRow, SkipsEmptyRows
{
    //
    protected $cells = [];

    public function model(array $row)
    {
        //dd("collection", $row[7]->getHyperlink()->getUrl());

        return [
            'name' => $row[0],
        ];
    }
    public function getCells(): array
    {
        return $this->cells;
    }

    public function onRow(Row $row)
    {
        $cells = [];

        foreach ($row->getDelegate()->getCellIterator() as $cell) {
            $cellObj = new Cell($cell);
            $cellPHPOffice = $cellObj->getDelegate();

            dd("cellPHPOffice", $cellPHPOffice);

            if ($cellPHPOffice->hasHyperlink()) {
                dd("cellPHPOffice", $cellPHPOffice->getHyperlink()->getUrl());
                $cells[] = $cellPHPOffice->getHyperlink()->getUrl();
            } else {
                $cells[] = $cellPHPOffice->getValue();
            }
        }

        $this->cells[] = $cells;
    }


    public function collection(array $rows)
    {
        $i = 0;

        $reports = array();

        //FALTA TERMINAR SACAR DEL TOKEN
        $ID_USER = Auth::user()->id ?? optional(Auth::user())->ID;

        $id_reports = [];

        dd("collection", $rows);

        foreach ($rows as $row) {

            if ($i == 0 || !$row[0]) {
                $i++;
                continue;
            }

            dd([
                "row" => $row,
                "6" => $row[6]->getCellIterator(),
                "7" => $row[7]->getCellIterator()
            ]);

            //foreach ($row as $col) {

            if (isset($row[6]) && gettype($row[6]) == 'integer')
                $fecha_ern = Date::excelToDateTimeObject($row[6]);
            else
                $fecha_ern = "";

            $report = Reports::firstOrCreate([
                'year' => $row[0],
                'codigo_emergencia' => $row[2],
                'departamento' => $row[3],
                'municipio' => $row[4],
                'tipo_emergencia' => $row[5],
                'fecha_ern' => $fecha_ern,
                'links' => $link1 . ',' . $link2,
                'ID_M_USUARIOS' => $ID_USER
            ]);
            $id_reports[] = $report->id;
            $reports[] = $report;
            //}
        }
        //array_push($id_emergenciasz, $mlpa_emergencia)

        migrateCustom::create([
            'table' => 'reports',
            'table_id' => implode(", ", $id_reports),
            'file_ref' => '-',
        ]);

        return $reports;
    }
}
