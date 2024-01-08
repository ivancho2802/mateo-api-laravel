<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
//use App\Models\DContactos;

class PaImportClass //implements DContactos
{
    //
    public function model(array $row)
    {
        return $row;
        // Define how to create a model from the Excel row data
        /* return new DContactos([
            'column1' => $row[0],
            'column2' => $row[1],
            // Add more columns as needed
        ]); */
    }
}
