<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\migrateCustom;
use Excel;
use App\Http\Controllers\ImportMatrizClass;
use App\Models\Matriz;
use Illuminate\Support\Collection;
use App\Traits\TraitDepartments;
use Illuminate\Support\Arr;
use Illuminate\Broadcasting\BroadcastException;
use Illuminate\Cache\RateLimiting\Limit;

class MatrizController extends Controller
{
  use TraitDepartments;


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    //$urls = Url::with('user')->latest()->get();

    return view('matrizprensa.index');
  }

  //
  function stored(Request $request)
  {

    ini_set('memory_limit', '2044M');
    set_time_limit(3000000); //0
    ini_set('max_execution_time', '60000');
    ini_set('max_input_time', '60000');

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

  function storedMatriz(Request $request)
  {

    ini_set('memory_limit', '2044M');
    set_time_limit(3000000); //0
    ini_set('max_execution_time', '60000');
    ini_set('max_input_time', '60000');

    try {


      //code...
      //dd("file", $request->file('file'));
      //echo csrf_token(); 
      //return response()->json(["request" => $request]);

      // Validate the uploaded file
      $request->validate([
        'file' => 'required|mimes:xlsx,xls|file',
      ]);

      // Get the uploaded file
      $file = $request->file('file');

      //get data excel
      $collection = (new MatrizClass)->toCollection($file);

      $import = new ImportMatrizClass();

      $import->onlySheets('Matriz');

      // Process the Excel file
      Excel::import($import, $file);



      if ($request->origin == 'api') {
        return ["msg" => "todo salio bien desde la api gracias por enviarl la informacion"];
      }
      //terminar devolver tabla
      return redirect('matrizprensa')->with(['success' => 'Datos guardados con exito.']);
    } catch (\Throwable $th) {

      if ($request->origin == 'api') {
        return ["msg" => "error al procesar la informacion:" . $th->getMessage()];
      }

      if ($th instanceof BroadcastException) {
        //return Limit::perMinute(300)->by($th->getMessage());
        return redirect('matrizprensa')->with(['error' => 'Error al procesar' . $th->getMessage()]);
      } else {
        return redirect('matrizprensa')->with(['error' => 'Error al procesar' . $th->getMessage()]);
      }

      //return redirect('matrizprensa')->with(['error' => 'Error al procesar' . $error]);
      //throw $th;
    }
    //, "data" => $data
    //return response()->json(["message" => "operacion hecha con exito"]);
  }

  /**
   * diccionario
   *      analisis general
   * palabras clave
   *      que cuente solo una palabra por descripcion
   *      podder asociar lo que salio del diccinoaroi con el id de los casos  
   */
  function all(Request $request)
  {
    $format = $request->format;

    $matrizMinas = Matriz::where(['origin' => 'minas'])->get()->groupBy('type');

    $i = 0;
    /**
     * 
     * $matrizMinasValues
     *[
     *   'Codigo' => [
     *       [
     *           'descriptionc' => '',
     *           'type_descriptionc' => 'Codigo',
     *       ],
     *       3333
     *   ]
     *]
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
       * que en la cadena de texto elimine la palabra "Solicitud de verificación"
       * ver como sacar horas
       * ver como sacar fechas 
       * SEP/2020
       * 31/10/2019
       * 29/6/2023
       * solo numeros
       * letras con codigos DIV04
       * letras con codigos BATOT24
       * quitar simbolos meno los : y los - y los / por que definen fecha y hora
       * 
       * BADRA12
       * BADRA7
       * CODIV8
       * BR15
       * BR22
       * X000D
       * CFUDRA2
       * FUDRA3
       * donde
       * para
       * cuando
       * como
       * cual
       * quien 
       * hasta
       * pero 
       * entre
       * eno
       * tiene
       * tienen
       * 
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
          !preg_match("/BATOT[0-9][0-9]$/", $key);
      })->sortDesc();

      $types = ([
        //'data' => $typesOriginal,
        'words' => $wordsArrayCountedFiltered //
      ]);

      return $types;
    });

    $flattened = Arr::dot($matrizMinasFormat);

    return $flattened;
  }

  function compareWords($words1, $words2)
  {

    $words = $words1->concat($words2);

    $wordsFormated = array_count_values($words);

    return $wordsFormated;
  }

  /**
   * diccionario
   *      analisis general
   * palabras clave
   *      que cuente solo una palabra por descripcion
   *      podder asociar lo que salio del diccinoaroi con el id de los casos  
   */
  function getMAPAEI(Request $request)
  {

    ini_set('memory_limit', '2044M');
    set_time_limit(3000000); //0
    ini_set('max_execution_time', '60000');
    ini_set('max_input_time', '60000');

    $format = $request->format;

    $matrizMinas = Matriz::where(['origin' => 'Afectacion_MAPAEI'])->get();

    $matrizMinas = $matrizMinas->map(function ($matriz) {
      $matrizCollect = collect($matriz);
      $filtered = $matrizCollect->except(['created_at', 'updated_at']);
      return $filtered;
    });

    //dd("matrizMinas", $matrizMinas->first());

    //$matrizMinasGroupType = $matrizMinas->groupBy('type');

    $i = 0;
    /**
     * 
     * $matrizMinasValues
     *[
     *   'Codigo' => [
     *       [
     *           'descriptionc' => '',
     *           'type_descriptionc' => 'Codigo',
     *       ],
     *       3333
     *   ]
     *]
     */

    $matrizMinasFormat = $matrizMinas->map(function ($typesOriginal) use ($i) {
      $i++;

      /* $typesOriginal = collect($types);

      dd($types->description); */

      $wordsArray =
        collect(
          explode(
            " ",
            mb_convert_encoding(
              preg_replace(
                '/([^A-Za-z0-9])/',
                " ",
                strtoupper(
                  $this->eliminar_acentos(
                    $typesOriginal['description']
                  )
                )
              ),
              'UTF-8',
              'UTF-8'
            )
          )
        )->filter()->toArray();

      return $wordsArray;
    });


    $collapsed = $matrizMinasFormat->collapse();

    //$collapsed->all()

    $collapsedArray = $collapsed->toArray();

    $wordsArrayCounted = collect(array_count_values(($collapsedArray)));

    /**
     * filtro de
     * repeticiones mayor a 2 
     * tamañp de string mayor a 3
     * conectores podria ser con 4 letras o con definidos como EL LA DEL EN DENTRO CON LAS LOS 
     * que en la cadena de texto elimine la palabra "Solicitud de verificación"
     * ver como sacar horas
     * ver como sacar fechas 
     * SEP/2020
     * 31/10/2019
     * 29/6/2023
     * solo numeros
     * letras con codigos DIV04
     * letras con codigos BATOT24
     * quitar simbolos meno los : y los - y los / por que definen fecha y hora
     * 
     * BADRA12
     * BADRA7
     * CODIV8
     * BR15
     * BR22
     * X000D
     * CFUDRA2
     * FUDRA3
     * donde
     * para
     * cuando
     * como
     * cual
     * quien 
     * hasta
     * pero 
     * entre
     * eno
     * tiene
     * tienen
     * 
     */
    $wordsConectors = collect([
      "EN",
      "ES",
      "ESO",
      "ESTO",
      "EL",
      "ELLA",
      "LA",
      "DEL",
      "LOS",
      "LAS",
      "YA",
      "SIN",
      "SEA",
      "QUE",
      "CUAL",
      "CUANDO",
      "DONDE",
      "DONDE",
      "HASTA",
      "DONDE",
      "DENTRO",
      "POR",
      "UNO",
      "UNA",
      "DOS",
      "FUE",
      "SAN",
      "SUS",
      "PARA",
      "TODO",
      "LADO",
      "TRES",
      "TOTAL",
      "TIENE",
      "SER",
      "POST",
      "MAS",
      "PERO",
      "AÑO",
      "PERO",
      "MISMO",
      "LUEGO",
      "COMO",
      "SON",
      "BIEN",
      "SALE",
      "TODO",
      "TODA",
      "DADOS",
      "DIA",
      "DIAS",
      "OTRA",
      "ASI",
      "OTRO",
      "OTRA",
      "TUVO",
      "DEJO",
      "DEJA",
      "MUY",
      "LES",
      "HACE",
      "CON"
    ]);

    $wordsArrayCountedFiltered = $wordsArrayCounted->filter(function ($value, $key) use ($wordsConectors) {

      $seachConnectors = $wordsConectors->search(function ($word) use ($key) {
        return $word == $key;
      });

      return
        $value > 3 &&
        strlen($key) > 2 &&
        !($seachConnectors !== false && $seachConnectors >= 0) &&
        strtolower($key) !== 'solicitud' && strtolower($key) !== 'verificación' &&
        !preg_match("/^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$/", $key) &&
        !preg_match("/^([0-2][0-9]|3[0-1])(\/|-)(0?[1-9]|1[1-2])\2(\d{4})$/", $key) &&
        !is_numeric($key) &&
        !preg_match("/DIV[0-9][0-9]$/", $key)  &&
        !preg_match("/X[0-9][0-9]$/", $key)  &&
        !preg_match("/BATOT[0-9][0-9]$/", $key);
    })->sortDesc();

    $diccionary = ($wordsArrayCountedFiltered);
    //dd("diccionary", $diccionary);



    $matrizMinasMatheched = $matrizMinas->map(function ($matriz) use ($diccionary) {

      //$matriz = collect($matrizOrigin);

      /* $matriz['foo'] = 42; */

      $diccionaryCollection = collect($diccionary);

      $wordsArray =
        collect(
          explode(
            " ",
            mb_convert_encoding(
              preg_replace(
                '/([^A-Za-z0-9])/',
                " ",
                strtoupper(
                  $this->eliminar_acentos(
                    $matriz['description']
                  )
                )
              ),
              'UTF-8',
              'UTF-8'
            )
          )
        )->filter()->toArray();


      $words = $diccionaryCollection->keys();
      $repitions = $diccionaryCollection->values()->all();

      $intersect = collect($wordsArray)->intersect($words);

      $intersect->all();

      //dd("intersect", $intersect, $wordsArray, $words);


      //$diccionaryCollection->each(function ($item, $key) use ($matriz) {

      //dd($repitions);

      $diccionaryCollection->each(function ($word, $key) use ($matriz) {
        $matriz['' . $key . ''] = 0;
      });

      //return $matriz;

      $resultMatriz = collect($intersect)->each(function ($wordDiccionary) use ($matriz, $intersect, $diccionaryCollection) {

        /* $check = $intersect->search(function ($element) use ($wordDiccionary) {
          return $element == $wordDiccionary;
        });
        */
        /* if ($wordDiccionary == 'EN') {
          dd("check", $check, $intersect, $wordDiccionary);
        } */
        //echo "check" . $check;


        //if ($check !== false && $check >= 0) {

        if (!isset($matriz['palabras_clave'])) {
          $matriz['palabras_clave'] = "";
        }

        if (!(strpos(strtoupper($matriz['palabras_clave']), strtoupper($wordDiccionary)) >= 0)) {
          $matriz['palabras_clave'] .= $wordDiccionary . ", ";
        }

        $matriz['' . $wordDiccionary . ''] = $diccionaryCollection[$wordDiccionary];
        /* } else {
          $matriz['' . $wordDiccionary . ''] = 0;
        } */

        //echo "matriz" . implode(",", $matriz);

        //return $matriz;
      });
      //});

      return $matriz;
    });

    return $matrizMinasMatheched;
  }

  function getMatriz(Request $request)
  {

    ini_set('memory_limit', '2044M');
    set_time_limit(3000000); //0
    ini_set('max_execution_time', '60000');
    ini_set('max_input_time', '60000');

    $format = $request->format;

    //dd("request", $request->origin);

    $tipo = $request->tipo ?? "matriz_" . $request->origin;

    $matrizMinas = Matriz::where(['origin' => $tipo])->get();

    $matrizMinas = $matrizMinas->map(function ($matriz) {
      $matrizCollect = collect($matriz);
      $filtered = $matrizCollect->except(['created_at', 'updated_at']);
      return $filtered;
    });

    //dd("matrizMinas", $matrizMinas->first());

    //$matrizMinasGroupType = $matrizMinas->groupBy('type');

    $i = 0;
    /**
     * 
     * $matrizMinasValues
     *[
     *   'Codigo' => [
     *       [
     *           'descriptionc' => '',
     *           'type_descriptionc' => 'Codigo',
     *       ],
     *       3333
     *   ]
     *]
     */

    $matrizMinasFormat = $matrizMinas->map(function ($typesOriginal) use ($i) {
      $i++;

      /* $typesOriginal = collect($types);

      dd($types->description); */

      $wordsArray =
        collect(
          explode(
            " ",
            mb_convert_encoding(
              preg_replace(
                '/([^A-Za-z0-9])/',
                " ",
                strtoupper(
                  $this->eliminar_acentos(
                    $typesOriginal['description']
                  )
                )
              ),
              'UTF-8',
              'UTF-8'
            )
          )
        )->filter()->toArray();

      return $wordsArray;
    });


    $collapsed = $matrizMinasFormat->collapse();

    //$collapsed->all()

    $collapsedArray = $collapsed->toArray();

    $wordsArrayCounted = collect(array_count_values(($collapsedArray)));

    /**
     * filtro de
     * repeticiones mayor a 2 
     * tamañp de string mayor a 3
     * conectores podria ser con 4 letras o con definidos como EL LA DEL EN DENTRO CON LAS LOS 
     * que en la cadena de texto elimine la palabra "Solicitud de verificación"
     * ver como sacar horas
     * ver como sacar fechas 
     * SEP/2020
     * 31/10/2019
     * 29/6/2023
     * solo numeros
     * letras con codigos DIV04
     * letras con codigos BATOT24
     * quitar simbolos meno los : y los - y los / por que definen fecha y hora
     * 
     * BADRA12
     * BADRA7
     * CODIV8
     * BR15
     * BR22
     * X000D
     * CFUDRA2
     * FUDRA3
     * donde
     * para
     * cuando
     * como
     * cual
     * quien 
     * hasta
     * pero 
     * entre
     * eno
     * tiene
     * tienen
     * 
     */
    $wordsConectors = collect([
      "EN",
      "ES",
      "ESO",
      "ESTO",
      "EL",
      "ELLA",
      "LA",
      "DEL",
      "LOS",
      "LAS",
      "YA",
      "SIN",
      "SEA",
      "QUE",
      "CUAL",
      "CUANDO",
      "DONDE",
      "DONDE",
      "HASTA",
      "DONDE",
      "DENTRO",
      "POR",
      "UNO",
      "UNA",
      "DOS",
      "FUE",
      "SAN",
      "SUS",
      "PARA",
      "TODO",
      "LADO",
      "TRES",
      "TOTAL",
      "TIENE",
      "SER",
      "POST",
      "MAS",
      "PERO",
      "AÑO",
      "PERO",
      "MISMO",
      "LUEGO",
      "COMO",
      "SON",
      "BIEN",
      "SALE",
      "TODO",
      "TODA",
      "DADOS",
      "DIA",
      "DIAS",
      "OTRA",
      "ASI",
      "OTRO",
      "OTRA",
      "TUVO",
      "DEJO",
      "DEJA",
      "MUY",
      "LES",
      "HACE",
      "CON"
    ]);

    $wordsArrayCountedFiltered = $wordsArrayCounted->filter(function ($value, $key) use ($wordsConectors) {

      $seachConnectors = $wordsConectors->search(function ($word) use ($key) {
        return $word == $key;
      });

      return
        $value > 3 &&
        strlen($key) > 2 &&
        !($seachConnectors !== false && $seachConnectors >= 0) &&
        strtolower($key) !== 'solicitud' && strtolower($key) !== 'verificación' &&
        !preg_match("/^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$/", $key) &&
        !preg_match("/^([0-2][0-9]|3[0-1])(\/|-)(0?[1-9]|1[1-2])\2(\d{4})$/", $key) &&
        !is_numeric($key) &&
        !preg_match("/DIV[0-9][0-9]$/", $key)  &&
        !preg_match("/X[0-9][0-9]$/", $key)  &&
        !preg_match("/BATOT[0-9][0-9]$/", $key);
    })->sortDesc();

    $diccionary = ($wordsArrayCountedFiltered);
    //dd("diccionary", $diccionary);



    $matrizMinasMatheched = $matrizMinas->map(function ($matriz) use ($diccionary) {

      //$matriz = collect($matrizOrigin);

      /* $matriz['foo'] = 42; */

      $diccionaryCollection = collect($diccionary);

      $wordsArray =
        collect(
          explode(
            " ",
            mb_convert_encoding(
              preg_replace(
                '/([^A-Za-z0-9])/',
                " ",
                strtoupper(
                  $this->eliminar_acentos(
                    $matriz['description']
                  )
                )
              ),
              'UTF-8',
              'UTF-8'
            )
          )
        )->filter()->toArray();


      $words = $diccionaryCollection->keys();
      $repitions = $diccionaryCollection->values()->all();

      $intersect = collect($wordsArray)->intersect($words);

      $intersect->all();

      //dd("intersect", $intersect, $wordsArray, $words);


      //$diccionaryCollection->each(function ($item, $key) use ($matriz) {

      //dd($repitions);

      $diccionaryCollection->each(function ($word, $key) use ($matriz) {
        $matriz['' . $key . ''] = 0;
      });

      //return $matriz;

      $resultMatriz = collect($intersect)->each(function ($wordDiccionary) use ($matriz, $intersect, $diccionaryCollection) {

        /* $check = $intersect->search(function ($element) use ($wordDiccionary) {
          return $element == $wordDiccionary;
        });
        */
        /* if ($wordDiccionary == 'EN') {
          dd("check", $check, $intersect, $wordDiccionary);
        } */
        //echo "check" . $check;


        //if ($check !== false && $check >= 0) {

        if (!isset($matriz['palabras_clave'])) {
          $matriz['palabras_clave'] = "";
        }

        if (!(strpos(strtoupper($matriz['palabras_clave']), strtoupper($wordDiccionary)) >= 0)) {
          $matriz['palabras_clave'] .= $wordDiccionary . ", ";
        }

        $matriz['' . $wordDiccionary . ''] = $diccionaryCollection[$wordDiccionary];
        /* } else {
          $matriz['' . $wordDiccionary . ''] = 0;
        } */

        //echo "matriz" . implode(",", $matriz);

        //return $matriz;
      });
      //});

      return $matriz;
    });

    $matrizMinasMatheched = $matrizMinasMatheched->map(function ($matriz) {
      $matriz->forget('description');
      return $matriz->all();
    });

    return $matrizMinasMatheched;
  }

  /**
   * diccionario
   *      analisis general
   * palabras clave
   *      que cuente solo una palabra por descripcion
   *      podder asociar lo que salio del diccinoaroi con el id de los casos  
   */
  function getMAPAEICustomDictionary(Request $request)
  {


    ini_set('memory_limit', '2044M');
    set_time_limit(3000000); //0
    ini_set('max_execution_time', '60000');
    ini_set('max_input_time', '60000');

    $format = $request->format;

    $tipo = $request->tipo ?? 'Afectacion_MAPAEI';

    $matrizMinas = Matriz::where(['origin' => $tipo])->get();

    $matrizMinas = $matrizMinas->map(function ($matriz) {
      $matrizCollect = collect($matriz);
      $filtered = $matrizCollect->except(['created_at', 'updated_at']);
      return $filtered;
    });

    //dd("matrizMinas", $matrizMinas->first());

    //$matrizMinasGroupType = $matrizMinas->groupBy('type');

    $i = 0;
    /**
     * 
     * $matrizMinasValues
     *[
     *   'Codigo' => [
     *       [
     *           'descriptionc' => '',
     *           'type_descriptionc' => 'Codigo',
     *       ],
     *       3333
     *   ]
     *]
     */

    $matrizMinasFormat = $matrizMinas->map(function ($typesOriginal) use ($i) {
      $i++;

      /* $typesOriginal = collect($types);

      dd($types->description); */

      $wordsArray =
        collect(
          explode(
            " ",
            mb_convert_encoding(
              preg_replace(
                '/([^A-Za-z0-9])/',
                " ",
                strtoupper(
                  $this->eliminar_acentos(
                    $typesOriginal['description']
                  )
                )
              ),
              'UTF-8',
              'UTF-8'
            )
          )
        )->filter()->toArray();

      return $wordsArray;
    });


    $collapsed = $matrizMinasFormat->collapse();

    //$collapsed->all()

    $collapsedArray = $collapsed->toArray();

    $wordsArrayCounted = collect(array_count_values(($collapsedArray)));

    /**
     * filtro de
     * repeticiones mayor a 2 
     * tamañp de string mayor a 3
     * conectores podria ser con 4 letras o con definidos como EL LA DEL EN DENTRO CON LAS LOS 
     * que en la cadena de texto elimine la palabra "Solicitud de verificación"
     * ver como sacar horas
     * ver como sacar fechas 
     * SEP/2020
     * 31/10/2019
     * 29/6/2023
     * solo numeros
     * letras con codigos DIV04
     * letras con codigos BATOT24
     * quitar simbolos meno los : y los - y los / por que definen fecha y hora
     * 
     * BADRA12
     * BADRA7
     * CODIV8
     * BR15
     * BR22
     * X000D
     * CFUDRA2
     * FUDRA3
     * donde
     * para
     * cuando
     * como
     * cual
     * quien 
     * hasta
     * pero 
     * entre
     * eno
     * tiene
     * tienen
     * 
     */
    $wordsConectors = collect([
      "EN",
      "ES",
      "ESO",
      "ESTO",
      "EL",
      "ELLA",
      "LA",
      "DEL",
      "LOS",
      "LAS",
      "YA",
      "SIN",
      "SEA",
      "QUE",
      "CUAL",
      "CUANDO",
      "DONDE",
      "DONDE",
      "HASTA",
      "DONDE",
      "DENTRO",
      "POR",
      "UNO",
      "UNA",
      "DOS",
      "FUE",
      "SAN",
      "SUS",
      "PARA",
      "TODO",
      "LADO",
      "TRES",
      "TOTAL",
      "TIENE",
      "SER",
      "POST",
      "MAS",
      "PERO",
      "AÑO",
      "PERO",
      "MISMO",
      "LUEGO",
      "COMO",
      "SON",
      "BIEN",
      "SALE",
      "TODO",
      "TODA",
      "DADOS",
      "DIA",
      "DIAS",
      "OTRA",
      "ASI",
      "OTRO",
      "OTRA",
      "TUVO",
      "DEJO",
      "DEJA",
      "MUY",
      "LES",
      "HACE",
      "CON"
    ]);

    $diccionaryCustom = json_decode('[
      {
        "ojos": "ocular",
        "cabeza": "craneo",
        "piernas": "miembro inferior",
        "pie": "pies",
        "manos": "dedo",
        "brazos": "brazo",
        "torso": "Espalda",
        "oido": "auditiva",
        "genitales": "testiculo",
        "rostro": "Cara",
        "cuello": ""
      },
      {
        "ojos": "visual",
        "cabeza": "",
        "piernas": "extremidad inferior",
        "pie": "astragalo",
        "manos": "dedos",
        "brazos": "hombro",
        "torso": "toracico",
        "oido": "auditivos",
        "genitales": "genital",
        "rostro": "pomulo",
        "cuello": ""
      },
      {
        "ojos": "ceguera",
        "cabeza": "",
        "piernas": "pierna",
        "pie": "tibia",
        "manos": "mano",
        "brazos": "antebrazo",
        "torso": "abdominal",
        "oido": "auditivo",
        "genitales": "pene",
        "rostro": "parpado",
        "cuello": ""
      },
      {
        "ojos": "retina",
        "cabeza": "",
        "piernas": "miembros inferiores",
        "pie": "perone",
        "manos": "muñeca",
        "brazos": "antebrazos",
        "torso": "pulmon",
        "oido": "auditivas",
        "genitales": "vagina",
        "rostro": "",
        "cuello": ""
      },
      {
        "ojos": "vision",
        "cabeza": "",
        "piernas": "extremidades inferiores",
        "pie": "",
        "manos": "artejo",
        "brazos": "hombros",
        "torso": "abdomen",
        "oido": "oidos",
        "genitales": "testiculos",
        "rostro": "",
        "cuello": ""
      },
      {
        "ojos": "",
        "cabeza": "",
        "piernas": "",
        "pie": "",
        "manos": "artejos",
        "brazos": "miembros superiores",
        "torso": "torax",
        "oido": "audicion",
        "genitales": "escroto",
        "rostro": "",
        "cuello": ""
      },
      {
        "ojos": "",
        "cabeza": "",
        "piernas": "",
        "pie": "",
        "manos": "",
        "brazos": "miembro superior",
        "torso": "higado",
        "oido": "",
        "genitales": "",
        "rostro": "",
        "cuello": ""
      },
      {
        "ojos": "",
        "cabeza": "",
        "piernas": "",
        "pie": "",
        "manos": "",
        "brazos": "",
        "torso": "clavicula",
        "oido": "",
        "genitales": "",
        "rostro": "",
        "cuello": ""
      }
    ]');

    $diccionaryCustomCollect = collect($diccionaryCustom);

    $diccionaryCustomCollectFormat = $diccionaryCustomCollect->map(function ($groupWord) {
      $groupWordCollect = collect($groupWord);
      $groupWordValues = $groupWordCollect->values();
      $groupWordKeys = $groupWordCollect->keys();

      $groupWordValues = $groupWordValues->concat($groupWordKeys);

      return $groupWordValues;
    });

    $collapsed = $diccionaryCustomCollectFormat->collapse();

    $collapsedFiltered = $collapsed->filter()->unique()->all();

    //snon las palabras del diccionario custom donde se combinan las keys y los valores
    $collapsedFiltered = collect($collapsedFiltered)->map(function ($word) {
      return strtoupper($word);
    });

    $wordsArrayCountedFiltered = $wordsArrayCounted->filter(function ($value, $key) use ($wordsConectors) {

      $seachConnectors = $wordsConectors->search(function ($word) use ($key) {
        return $word == $key;
      });

      return
        $value > 3 &&
        strlen($key) > 2 &&
        !($seachConnectors !== false && $seachConnectors >= 0) &&
        strtolower($key) !== 'solicitud' && strtolower($key) !== 'verificación' &&
        !preg_match("/^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$/", $key) &&
        !preg_match("/^([0-2][0-9]|3[0-1])(\/|-)(0?[1-9]|1[1-2])\2(\d{4})$/", $key) &&
        !is_numeric($key) &&
        !preg_match("/DIV[0-9][0-9]$/", $key)  &&
        !preg_match("/X[0-9][0-9]$/", $key)  &&
        !preg_match("/BATOT[0-9][0-9]$/", $key);
    })->sortDesc();

    //es el diccionario filtrado con las repeticiones key son las palabras values son las repeticiones
    $diccionary = ($wordsArrayCountedFiltered);
    //dd("diccionary", $diccionary);

    /* $matrizMinasMatheched = $matrizMinas->map(function ($matriz) use ($diccionary, $collapsedFiltered) {

      //$matriz = collect($matrizOrigin);

      // $matriz['foo'] = 42;
      //dd("collapsedFiltered", $collapsedFiltered);

      $diccionaryCollection = collect($diccionary);

      $wordsArray =
      collect(
        explode(
          " ",
          mb_convert_encoding(
            preg_replace(
              '/([^A-Za-z0-9])/',
              " ",
              strtoupper(
                $this->eliminar_acentos(
                  $matriz['description']
                )
              )
            ),
            'UTF-8',
            'UTF-8'
          )
        )
      )->filter()->toArray();


      $words = $diccionaryCollection->keys();
      $repitions = $diccionaryCollection->values()->all();

      //lo intercepto para que solo salgan laspalabras del registro de la matriz actual y las palabras del diccionario de datos
      $intersectWordsVsMatriz = collect($wordsArray)->intersect($words);

      $intersectWordsVsMatriz->all();
        
      //se intercepta las palabras del diccionario custom con las palabras del registro filtrada por las palabras clave
      $intersect = ($intersectWordsVsMatriz)->intersect($collapsedFiltered);

      $intersect->all();

      //dd("intersect", $intersect, $collapsedFiltered, $intersectWordsVsMatriz);

      $intersect->each(function ($word, $key) use ($matriz) {
        $matriz['' . $word . ''] = 0;
      });

      //return $matriz;

      //se rrecorre el intersect para que en cada posisicoin quede 
      $resultMatriz = collect($intersect)->each(function ($wordDiccionary) use ($matriz, $intersect, $diccionaryCollection) {

        if (!isset($matriz['palabras_clave'])) {
          $matriz['palabras_clave'] = "";
        }

        if (!(strpos(strtoupper($matriz['palabras_clave']), strtoupper($wordDiccionary)) >= 0)) {
          $matriz['palabras_clave'] .= $wordDiccionary . ", ";
        }

        $matriz['' . $wordDiccionary . ''] = $diccionaryCollection[$wordDiccionary];
        // } else {
        //  $matriz['' . $wordDiccionary . ''] = 0;
        //} 

        //echo "matriz" . implode(",", $matriz);

        //return $matriz;
      });
      //});

      return $matriz;
    }); */

    $matrizMinasMathechedGrouped = collect([]);

    $matrizMinasMathechedGrouped = $matrizMinas->map(function ($matriz) use ($diccionaryCustom, $diccionary) {

      $wordsArray =
        collect(
          explode(
            " ",
            mb_convert_encoding(
              preg_replace(
                '/([^A-Za-z0-9])/',
                " ",
                strtoupper(
                  $this->eliminar_acentos(
                    $matriz['description']
                  )
                )
              ),
              'UTF-8',
              'UTF-8'
            )
          )
        )->filter()->toArray();

      $diccionaryCustom = collect($diccionaryCustom);

      $diccionaryCustom = $diccionaryCustom->map(function ($dic) {
        return collect($dic)->mapWithKeys(function ($word, $key) {
          return [strtoupper($key) => strtoupper($word)];
        });
      });

      //estraer el objeto complementario base
      $matrizObject = $diccionaryCustom->first();

      $matrizObject = ($matrizObject)->keys();

      $matrizObject->each(function ($wordObject) use ($matriz) {
        $matriz[$wordObject] = 0;
      });

      //fin estraer el objeto complementario base

      foreach ($wordsArray as $key => $value) {
        //dd("value", $value);

        $diccionaryCustom->each(function ($wordM, $key) use ($value, $diccionary, $matriz) {

          $filteredWord = $wordM->filter(function ($wordF, $keyF) use ($value) {
            return isset($wordF) && isset($keyF) && ($wordF == $value || $keyF == $value);
          });


          if (count($filteredWord) > 0) {

            //["PIERNAS" => "PIERNA"    ]
            $filteredWord->each(function ($valueF, $keyF) use ($diccionary, $matriz) {

              if (isset($valueF) && ($valueF) !== "") {
                //dd($matriz[$valueF], $diccionary[$valueF]);
                if (!isset($diccionary[$valueF])) {
                  $matriz[$valueF] = 0;
                  //$matriz[$valueF . 'group'] = $keyF;
                } else {
                  $matriz[$valueF] = $diccionary[$valueF];
                  if (!isset($matriz['group'])) {
                    $matriz['group'] = '';
                  }
                  if (stripos($matriz['group'], $keyF) === false) {
                    $matriz['group'] .= $keyF . ', ';
                  }
                }
              }
            });
          }

          /* if( == $value){
            dd($diccionary, $value);
            $matriz[$value] = $value;
          }
          if($wordM == $key){
            $matriz[$key] = $key;
          } */
        });
      }

      return $matriz;
    });

    $matrizMinasMathechedGroupedC = collect($matrizMinasMathechedGrouped);
    $matrizMinasMathechedGroupedC = $matrizMinasMathechedGroupedC->sortBy("id");

    return ["group" => $matrizMinasMathechedGroupedC->values()->all()]; //, 'total' => $matrizMinasMatheched
  }
}
