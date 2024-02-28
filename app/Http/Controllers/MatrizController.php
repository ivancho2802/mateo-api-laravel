<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\migrateCustom;
use Excel;
use App\Http\Controllers\ImportMatrizClass;
use App\Models\Matriz;
use Illuminate\Support\Collection;

class MatrizController extends Controller
{
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

        //dd($matrizMinas->all());
        //return $matrizMinas;

        //$matrizMinasKeys = array_keys($matrizMinas);array_values
        $matrizMinasValues = ($matrizMinas);

        $matrizMinasValuesFormated = [$matrizMinasValues->keys()[0] => collect(), $matrizMinasValues->keys()[1] => collect(), $matrizMinasValues->keys()[2] => collect(), $matrizMinasValues->keys()[3] => collect()];

        //dd($matrizMinasValuesFormated);

        $count = count($matrizMinasValues);
        $i = 0;
        $matrizMinasValues->eachSpread(function (Collection $previous, Collection $types) use ($matrizMinasValues, $matrizMinasValuesFormated, $count, $i) {
            $i++;

            dd($previous, $types);

            // Process the log entry...
            $types->each(function (object $value)  use ($matrizMinasValues, $matrizMinasValuesFormated, $count) {
                // Process the log entry...
                $words = explode(" ", $value->description);
                $count--;
                echo count($matrizMinasValues) / $count . '\n';

                $matrizMinasValues->each(function (object $types2)  use ($words, $value, $matrizMinasValuesFormated) {
                    // Process the log entry...
                    $types2->each(function (object $value2)  use ($words, $value, $matrizMinasValuesFormated) {
                        // Process the log entry...
                        $words2 = explode(" ", $value2->description);
                        if ($value2->id !== $value->id && $value2->type !== $value->type) {
                            //contateno words y words2 
                            //agrupo alli contaria
                            $wordsTodas = array();
                            $wordsTodas[] = $words;
                            $wordsTodas[] = $words2;
                            $matrizMinasValuesFormated[$value->type] = $matrizMinasValuesFormated[$value->type]->concat($wordsTodas);
                        }
                    });
                });
            });
        });

        /* foreach ($matrizMinas as $key => $types) {
            foreach ($types as $key2 => $value) {
                
                $words = explode($value->description, ' ');

                $types->search(function (object $item, int $key) {
                    $words2 = explode($item->description, ' ');
                    return $item->description;
                });

                array_push($matrizMinasValuesFormated, [
                    
                ]);
            }
        } */
        //dd($matrizMinasValuesFormated);

        //$format

        //descartar 
        //conectores podria ser con 4 letras o con definidos como EL LA DEL EN DENTRO CON LAS LOS 
        //letras con codigos
        //solo numeros
        //simbolos
        //ver como sacar fechas 
        //ver como sacar horas
        //que en solicitud elimine "Solicitud de verificación"

        return $matrizMinasValuesFormated;
    }

    function compareWords($words1, $words2)
    {

        $words = $words1->concat($words2);

        $wordsFormated = array_count_values($words);

        return $wordsFormated;
    }
}
