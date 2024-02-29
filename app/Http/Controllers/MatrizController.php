<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\migrateCustom;
use Excel;
use App\Http\Controllers\ImportMatrizClass;
use App\Models\Matriz;
use Illuminate\Support\Collection;
use App\Traits\TraitDepartments;

class MatrizController extends Controller
{
    use TraitDepartments;

    //
    function stored(Request $request)
    {
        //dd("file", $request->file('file'));
        //echo csrf_token(); 
        //return response()->json(["request" => $request]);

        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        //get data excel
        $collection = (new MatrizClass)->toCollection($file);

        $import = new ImportMatrizClass();

        $import->onlySheets('Hoja1');

        // Process the Excel file
        Excel::import($import, $file);


        //terminar devolver tabla
        //return view('list-activities', $data);, "data" => $data
        return response()->json(["message" => "operacion hecha con exito"]);
    }

    function all(Request $request)
    {
        $format = $request->format;

        $matrizMinas = Matriz::where(['origin' => 'minas'])->get()->groupBy('type');

        $i = 0;
        /**
         * 
            * $matrizMinasValues
            [
                'Codigo' => [
                    [
                        'descriptionc' => '',
                        'type_descriptionc' => 'Codigo',
                    ],
                    3333
                ]
            ]
        */

        $matrizMinasFormat = $matrizMinas->map(function (Collection $types) use ($i) {
            $i++;

            $typesOriginal = collect($types);

            $wordsArray = 
            collect(
                explode(
                    " ",
                    mb_convert_encoding(
                        preg_replace(
                            '/([^A-Za-z0-9])/',
                            " ",
                            strtoupper($this->eliminar_acentos(
                                $typesOriginal->map(function ($type) {
                                    return $type->description;
                                })->implode(' ')
                            ))
                        ),
                        'UTF-8', 
                        'UTF-8'
                    )
                )
            )->filter()->toArray();
            
            
            $wordsArrayCounted = collect(array_count_values(($wordsArray)));

            /**
             * filtro de
             * repeticiones mayor a 2 
             * tamañp de string mayor a 3
             * conectores podria ser con 4 letras o con definidos como EL LA DEL EN DENTRO CON LAS LOS 
             * que en solicitud elimine "Solicitud de verificación"
             * ver como sacar horas
             * ver como sacar fechas 
                * SEP/2020
                * 31/10/2019
                * 29/6/2023
             * solo numeros
             * letras con codigos DIV04
             * letras con codigos BATOT24
             * quitar simbolos meno los : y los - y los / por que definen fecha y hora
             */
            $wordsArrayCountedFiltered = $wordsArrayCounted->filter(function ($value, $key) {
                return 
                    $value > 2 && 
                    strlen($key) > 3 &&
                    strtolower($key) !== 'solicitud' && strtolower($key) !== 'verificación' &&
                    !preg_match("/^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$/", $key) &&
                    !preg_match("/^([0-2][0-9]|3[0-1])(\/|-)(0?[1-9]|1[1-2])\2(\d{4})$/", $key) &&
                    !is_numeric($key) &&
                    !preg_match("/DIV[0-9][0-9]$/", $key)  &&
                    !preg_match("/BATOT[0-9][0-9]$/", $key) 
                ;
            })->sortDesc();

            $types = ([
                'data' => $typesOriginal,
                'words' => $wordsArrayCountedFiltered//
            ]);

            return $types;

        });

        return $matrizMinasFormat;//->dot();
    }

    function compareWords($words1, $words2)
    {

        $words = $words1->concat($words2);

        $wordsFormated = array_count_values($words);

        return $wordsFormated;
    }
}
