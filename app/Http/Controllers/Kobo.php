<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\MKoboRespuestas;
use Illuminate\Support\Facades\DB;
use App\Traits\TraitDepartments;
use Illuminate\Support\Arr;

class Kobo extends Controller
{
    use TraitDepartments;

    //
    public function getKoboLabels($uui, $token, $dominioTi)
    {

        //dd($uui, $token);
        $dominioTitle =  $dominioTi == 'kf.acf-e.org' ? 'kc.acf-e.org' : ($dominioTi == 'eu.kobotoolbox.org' ? 'kc-eu.kobotoolbox.org' :  $dominioTi);
        $dominio = $dominioTi;

        $jsonurl = "https://" . $dominio . "/assets/" . $uui . "/submissions/?format=json";

        /* $response = Http::accept('application/json')
                ->withBasicAuth('ugi', 'ugiach')//ugi@co.acfspain.org | ugi
                ->get($jsonurl); */

        $response = Http::withHeaders([
            'Authorization' => 'Token ' . $token,
            'Accept' => 'application/json'
        ])
            ->get($jsonurl)
            ->json();

        $dataSubdmissions = collect($response);

        //obtener los labes

        //https://kc.acf-e.org/api/v1/forms?id_string=a4E3J9gkULZe5eRqQph8zh
        $jsonurlform = "https://" . $dominioTi . "/api/v1/forms?id_string=" . $uui;

        $dataForm = Http::withHeaders([
            'Authorization' => 'Token ' . $token . '',
            'Accept' => '*/*'
        ])
            ->get($jsonurlform)
            ->json();

        $formid = collect($dataForm[0])->get('formid');

        //https://kc.acf-e.org/api/v1/forms/2433/form.json
        $jsonurlDataLabels = "https://" . $dominioTi . "/api/v1/forms/" . $formid . "/form.json";

        $dataDataLabelsResponse = Http::withHeaders([
            'Authorization' => 'Token ' . $token . '',
            'Accept' => 'application/json'
        ])
            ->get($jsonurlDataLabels)
            ->json();

        $dataLabels = collect($dataDataLabelsResponse);

        /**
         * [
         *"name" => "akvWrUs835hE6zL5oYRYhY"
         *"title" => "COF2AR_atención_salud_NNA"
         *"sms_keyword" => "akvWrUs835hE6zL5oYRYhY"
         *"default_language" => "default"
         *"choices" => array:88 [
         *"children" => array: [
         */
        //dd("dataLabels", $dataLabels);//9

        //dd("dataSubdmissions", $dataSubdmissions);
        /**
         * Illuminate\Support\Collection {#1348
         *    #items: array:481 [
         *        0 => array:224 [
         *        "valoracion_nutricional/tiempo_comida" => "2_comidas"
         *        "diagnostico_analisis_nutricional/diagnostico_nutricional_CIE10" => "E440_Destrucion_proteicocalorica_moderada"
         */

        $formated = $dataSubdmissions->map(function ($submission) use ($dataLabels) {

            //dd("submission", $submission);//224

            $dataLabelsCollection = collect($dataLabels);

            //dd("dataLabels", $dataLabelsCollection->get("children")[6]['name']);

            //[
            // * "pregunta" => "respuesta",
            // * "pregunta2" => "respuesta2",
            // * ]
            // *

            /**
             * "name" => "valoracion_seguimiento_ninos_as"
             *  "bind" => array:1 [ …1]
             *   "label" => "Valoración y seguimiento médico nutricional de niños y niñas"
             */
            $dataLabelsChildren = collect($dataLabelsCollection->get("children"));
            //dd("dataLabelsChildren", $dataLabelsChildren);
            //dd($keys, $values);

            $submissionFormated = collect($submission)->flatMap(function ($valueSub, $keySub) use ($dataLabelsChildren) {

                $collectionName = collect(explode('/', $keySub));

                $itemKeyFiltered = $dataLabelsChildren->filter(function ($item) use ($collectionName) {
                    //echo $item['name'] . '--' . json_encode( explode('/', $keySub)) . '----------\n';

                    //dd(($collectionName)->first(), ($collectionName)->last());

                    $itemCollection = collect($item);

                    //dd($item['name'] .  $collectionName->first());//->get("children")

                    if (count($collectionName) > 0 && optional($itemCollection)->get("children")) {

                        $children2 = collect(optional($itemCollection)->get("children"));

                        //dd("children2", $children2);

                        $children2Fortmat = $children2->map(function ($chield) {
                            $children2Collect = collect($chield); //->forget('name');
                            return $children2Collect['name'];
                        });

                        $children2FortmatCollect = collect($children2Fortmat);

                        return ($collectionName->first() == $item['name'] && $children2FortmatCollect->search($collectionName->last())) !== false;
                    }

                    return ($item['name'] == $collectionName->first()) !== false;
                });

                $itemKeyFilteredCollect = collect(collect($itemKeyFiltered)->first());
                //dd("itemKeyFilteredCollect", $itemKeyFilteredCollect->get('label'));

                $children2Label = '';

                if (count($collectionName) > 0 && optional($itemKeyFilteredCollect)->get("children")) {

                    $children2Collect = collect(optional($itemKeyFilteredCollect)->get("children"));
                    //dd("children2", $children2, $collectionName->last());

                    $children2FortmatCollectFiltered = $children2Collect
                        ->filter(function ($children2) use ($collectionName) {
                            return $children2['name'] == $collectionName->last();
                        })->first();

                    //dd($children2FortmatCollectFiltered['label']);

                    $children2Label = isset($children2FortmatCollectFiltered['label']) ? $children2FortmatCollectFiltered['label'] : $collectionName->last();
                }

                $itemSub = collect([
                    optional($itemKeyFilteredCollect)->get('label') ? optional($itemKeyFilteredCollect)->get('label') . '/' . $children2Label : $keySub => $valueSub
                ]);

                //dd("itemSub", $itemSub);

                return $itemSub;
            });

            //dd("submissionFormated", $submissionFormated); //224

            /* for ($i = 0; $i < count($keys); $i++) {
                    $keysCurrent = $keys[$i];
                    $valuesCurrent = $values[$i];
    
                    $indexLabelsChildren = $dataLabelsChildren->filter(function ( $item, int $key) use ($keysCurrent) {
                        return strpos($keysCurrent, $item['name'])>=0;
                    });
                    
                    dd($indexLabelsChildren->first());
    
                    $submissionFormated[] = [
    
                    ];
                } */

            //dd($submission);


            //$submission->valoracion_seguimiento_ninos_as

            //$submission[] = $submissionFormated;

            return $submissionFormated;
        });

        return $formated
            /* [
                "status" => $response->getStatusCode(),
                "data" => $response->body(),
                "json" => $response->json() ,
                "object" => $response->object() ,
                "status" => $response->status() ,
                "successful" => $response->successful() ,
                "clientError" => $response->clientError() ,
                //"mkoboformulario" => $formulario->get()
            ] */;
    }


    public function getKobo($uui, $token, $dominioTi)
    {

        //dd($uui, $token);
        $dominioTitle =  $dominioTi == 'kf.acf-e.org' ? 'kc.acf-e.org' : ($dominioTi == 'eu.kobotoolbox.org' ? 'kc-eu.kobotoolbox.org' :  $dominioTi);
        $dominio = $dominioTi;

        $jsonurl = "https://" . $dominio . "/assets/" . $uui . "/submissions/?format=json";
        //https://kobo2.actioncontrelafaim.org/assets/aryU2j5obPFCWfrRbcASGT/submissions/?format=json

        /* $response = Http::accept('application/json')
                ->withBasicAuth('ugi', 'ugiach')//ugi@co.acfspain.org | ugi
                ->get($jsonurl); */

        $response = Http::withHeaders([
            'Authorization' => 'Token ' . $token,
            'Accept' => 'application/json'
        ])
            ->get($jsonurl)
            ->json();

        $dataSubdmissions = collect($response);

        $coleccionModificada = $dataSubdmissions->map(function ($item) {
            $matrizCollect = collect($item);
            $data = $matrizCollect->except(['meta/instanceID', 'meta\/instanceID', 'formhub/uuid', 'formhub\/uuid', '_attachments', '_geolocation', '_tags', '_notes', '_validation_status']);
            return $data;
        });

        /* $matrizMinas = $matrizMinas->map(function ($matriz) {
            $matrizCollect = collect($matriz);
            $filtered = $matrizCollect->except(['created_at', 'updated_at']);
            return $filtered;
        }); */

        $arregloModificado = $coleccionModificada->toArray();

        return $arregloModificado;
    }

    public function exportByuui($id, $token)
    {
        /* try { */

        $limit_minutes = 900;
        ini_set('default_socket_timeout', $limit_minutes); // 900 Seconds = 15 Minutes
        ini_set('memory_limit', '2044M');
        set_time_limit($limit_minutes); //0
        ini_set('max_execution_time', '' . $limit_minutes . '');
        ini_set('max_input_time', '' . $limit_minutes . '');

        $filesExported = Storage::files("/htmlToPdf/cash_echo/");

        $timestart = time();

        $formid = $id;

        //https://kc.kobotoolbox.org/api/v1/data/28058/20/enketo?return_url=url
        //$jsonurlDataEnketo = "https://kc.acf-e.org/api/v1/data/" . $formid . "/" . $dataId . "/enketo?return_url=false";
        //$jsonurlDataEnketo = "https://kc.acf-e.org/api/v1/data/" . $formid;
        $jsonurlDataEnketo = "https://kf.acf-e.org/assets/" . $formid . "/submissions/?format=json";
        //'timeout' => 1200,  //1200 Seconds is 20 Minutes

        $dataEnketoResponse = Http::withHeaders([
            'Authorization' => 'Token ' . $token . '',
            'Accept' => 'application/json'
        ])
            ->get($jsonurlDataEnketo)
            ->json();

        $dataEnketoResponseFiltered = collect($dataEnketoResponse)->filter(function ($item, $key) use ($filesExported) {

            $filesExportedCollect = collect($filesExported);

            $filesExportedCollect = $filesExportedCollect->map(function ($fileExport) {
                $extract_id = explode('_', $fileExport);
                $extract_id = str_replace(".pdf", "", $extract_id[2]);
                return '' . $extract_id . '';
            });

            return ($filesExportedCollect->search($item['_id'])) === false;
        });

        /* dd(
            "exportaciones totales" , count($dataEnketoResponse),
            "exportaciones que se procesaran" , count($dataEnketoResponseFiltered),
            "exportaciones procesadas", count($filesExported),
            "exportaciones faltantes", count($dataEnketoResponse) - count($filesExported)
            ); */

        $dataEnketo = collect($dataEnketoResponseFiltered)->chunk(45);

        if (count($dataEnketoResponse) == count($filesExported)) {

            $resultCreated = helper::makeZipWithFiles("cash_echo.zip", $filesExported);

            //$ramdom = Carbon\Carbon::now()->timestamp;
            //dd(Carbon\Carbon::now()->timestamp, time());

            if ($resultCreated === true) {
                return response()->download(public_path("cash_echo.zip"))->deleteFileAfterSend(true);
            } else {
                return response()->json(['status' => false, 'message' => $resultCreated], 503);
            }
        }

        //contruyrndo las imagenes del formulario

        $dataEnketoWithImage = collect($dataEnketo[0]->map(function ($chield) use ($token, $filesExported) {
            $formulario = collect($chield); //->forget('name');

            $claves = collect($formulario->keys())->filter()->all();
            $valores =  array_values($formulario->toArray());

            for ($i = 0; $i < count($claves); $i++) {
                # code...
                $clave = ($claves[$i]);
                $valor = $valores[$i];

                if (!is_array($valor) && isset($clave)) {

                    if (
                        (stripos($valor, '.jpg') !== false && stripos($valor, '.jpg') == (strlen($valor) - strlen('.jpg'))) ||
                        (stripos($valor, '.png') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png'))) ||
                        (stripos($valor, '.jpeg') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png'))) ||
                        (stripos($valor, '.svg') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png')))
                    ) {
                        $chield_attachments = collect($chield['_attachments']);

                        $urlImgFirst = $chield_attachments->filter(function ($atached) use ($valor) {
                            return isset($atached['download_url']) && (stripos($atached['download_url'], $valor) !== false);
                        });


                        $urlImg = collect($urlImgFirst);
                        //dd("urlImg", $urlImg, $urlImg->first(), $urlImg->first()['download_url']);

                        if (count($urlImgFirst) > 0) {

                            //convertir la imagen en su respuesta
                            $imageResponse = Helper::getImageWithHeaders($urlImg->first()['download_url'], $token);

                            $formulario[$clave] = $imageResponse ?? $urlImg->first()['download_url'];
                        }
                        /* elsedd("esto no deberia psasr"); */
                    }
                }
            }

            return $formulario;
        }));

        $dataEnketoWithImage->filter()->all();

        $dataEnketoWithImage->each(function (Collection $item) use ($timestart, $limit_minutes, $dataEnketoResponse) {

            $id_file = $item->get('_id');

            $filename = '/htmlToPdf/cash_echo/Acuerdo De Transferencia Monetarias - Cash ECHO_' . $id_file . '.pdf';

            if (!Storage::disk('local')->exists($filename)) {
                $pdf = Pdf::loadView('pdf.formulario', ["data" => $item]);
                $content = $pdf->download()->getOriginalContent();
                Storage::put($filename, $content);
            }

            $currentTimeExecuted = time() - $timestart;

            $limit_minutes_ajust = $limit_minutes - 100;
            echo $currentTimeExecuted . " > " . $limit_minutes_ajust . ' = ' . ($currentTimeExecuted > $limit_minutes_ajust) . "\n";

            if ($currentTimeExecuted > $limit_minutes_ajust) {
                $filesExported = Storage::files("/htmlToPdf/cash_echo/");
                echo "exportaciones totales" . count($dataEnketoResponse) . " \n";
                echo "exportaciones procesadas" . count($filesExported) . " \n";
                echo "exportaciones faltantes" . (count($dataEnketoResponse) - count($filesExported)) . " \n";

                return response()->json([
                    "exportaciones totales" => count($dataEnketoResponse),
                    "exportaciones procesadas" => count($filesExported),
                    "exportaciones faltantes" => count($dataEnketoResponse) - count($filesExported),
                ]);
            }
        });

        /* return response()
            ->view('pdf.formulario', ["data" => $dataEnketoWithImage->first()], 200);
            dd("esta en 45 no se proceso por time out ver como estan los estilos con uno revisar des pues de _318932"); */

        if (count($dataEnketoResponse) == count($filesExported)) {

            $resultCreated = helper::makeZipWithFiles("cash_echo.zip", $filesExported);

            //$ramdom = Carbon\Carbon::now()->timestamp;
            //dd(Carbon\Carbon::now()->timestamp, time());

            if ($resultCreated === true) {
                return response()->download(public_path("cash_echo.zip"))->deleteFileAfterSend(true);
            } else {
                return response()->json(['status' => false, 'message' => $resultCreated], 503);
            }
        } else {

            $filesExported = Storage::files("/htmlToPdf/cash_echo/");

            return response()->json([
                "exportaciones totales" => count($dataEnketoResponse),
                "exportaciones procesadas" => count($filesExported),
                "exportaciones faltantes" => count($dataEnketoResponse) - count($filesExported)
            ]);
        }

        /* return response()
            ->view('pdf.formulario', ["data" => $dataEnketoWithImage->first()], 200)
            ->header('Authorization', 'Token ' . $token); */
        /* } catch (\Throwable $th) {
            

            $filesExported = Storage::files("/htmlToPdf/cash_echo/");

            return response()->json([
                "error" => $th,
                "exportaciones procesadas" => count($filesExported),
            ]);
        } */
    }

    public function exportByid($uui, $token)
    {
        /* try { */

        $limit_minutes = 800;
        ini_set('default_socket_timeout', $limit_minutes); // 900 Seconds = 15 Minutes
        ini_set('memory_limit', '2044M');
        set_time_limit($limit_minutes); //0
        ini_set('max_execution_time', '' . $limit_minutes . '');
        ini_set('max_input_time', '' . $limit_minutes . '');

        $filesExported = Storage::files("/htmlToPdf/cash_echo/");

        $timestart = time();

        $formid = $uui;

        //https://kc.kobotoolbox.org/api/v1/data/28058/20/enketo?return_url=url
        //$jsonurlDataEnketo = "https://kc.acf-e.org/api/v1/data/" . $formid . "/" . $dataId . "/enketo?return_url=false";
        $jsonurlDataEnketo = "https://kc.acf-e.org/api/v1/data/" . $formid;
        //'timeout' => 1200,  //1200 Seconds is 20 Minutes

        $dataEnketoResponse = Http::withHeaders([
            'Authorization' => 'Token ' . $token . '',
            'Accept' => 'application/json'
        ])
            ->get($jsonurlDataEnketo)
            ->json();


        $dataEnketoResponseFiltered = collect($dataEnketoResponse)->filter(function ($item, $key) use ($filesExported) {

            $filesExportedCollect = collect($filesExported);

            $filesExportedCollect = $filesExportedCollect->map(function ($fileExport) {
                $extract_id = explode('_', $fileExport);
                $extract_id = str_replace(".pdf", "", $extract_id[2]);
                return '' . $extract_id . '';
            });

            return ($filesExportedCollect->search($item['_id'])) === false;
        });

        /* dd(
            "exportaciones totales" , count($dataEnketoResponse),
            "exportaciones que se procesaran" , count($dataEnketoResponseFiltered),
            "exportaciones procesadas", count($filesExported),
            "exportaciones faltantes", count($dataEnketoResponse) - count($filesExported)
            ); */

        $dataEnketo = collect($dataEnketoResponseFiltered)->chunk(45); //;



        if (count($dataEnketoResponse) == count($filesExported)) {

            $resultCreated = helper::makeZipWithFiles("cash_echo.zip", $filesExported);

            //$ramdom = Carbon\Carbon::now()->timestamp;
            //dd(Carbon\Carbon::now()->timestamp, time());

            if ($resultCreated === true) {
                return response()->download(public_path("cash_echo.zip"))->deleteFileAfterSend(true);
            } else {
                return response()->json(['status' => false, 'message' => $resultCreated], 503);
            }
        }

        //$urlHtmlPdf = $dataEnketo->first();

        //onbtener url de lso iagens https://kc.acf-e.org/api/v1/media/2486

        //imagenes del formulario
        /* $urlMedia = "https://kc.acf-e.org/api/v1/media/";
                
                $dataMediaResponse = Http::withHeaders([
                    'Authorization' => 'Token ' . $token . '',
                    'Accept' => 'application/json'
                ])
                    ->get($urlMedia); */
        //return $dataEnketo;,

        //contruyrndo las imagenes del formulario

        $dataEnketoWithImage = collect($dataEnketo[0]->map(function ($chield) use ($token, $filesExported) {
            $formulario = collect($chield); //->forget('name');

            $claves = collect($formulario->keys())->filter()->all();
            $valores =  array_values($formulario->toArray());

            for ($i = 0; $i < count($claves); $i++) {
                # code...
                $clave = ($claves[$i]);
                $valor = $valores[$i];

                if (!is_array($valor) && isset($clave)) {

                    if (
                        (stripos($valor, '.jpg') !== false && stripos($valor, '.jpg') == (strlen($valor) - strlen('.jpg'))) ||
                        (stripos($valor, '.png') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png'))) ||
                        (stripos($valor, '.jpeg') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png'))) ||
                        (stripos($valor, '.svg') !== false && stripos($valor, '.png') == (strlen($valor) - strlen('.png')))
                    ) {
                        $chield_attachments = collect($chield['_attachments']);

                        $urlImgFirst = $chield_attachments->filter(function ($atached) use ($valor) {
                            return isset($atached['download_url']) && (stripos($atached['download_url'], $valor) !== false);
                        });


                        $urlImg = collect($urlImgFirst);
                        //dd("urlImg", $urlImg, $urlImg->first(), $urlImg->first()['download_url']);

                        if (count($urlImgFirst) > 0) {

                            //convertir la imagen en su respuesta
                            $imageResponse = Helper::getImageWithHeaders($urlImg->first()['download_url'], $token);

                            $formulario[$clave] = $imageResponse ?? $urlImg->first()['download_url'];
                        }
                        /* elsedd("esto no deberia psasr"); */
                    }
                }
            }

            return $formulario;
        }));

        //dd("dataEnketoWithImage", $dataEnketoWithImage->first());//, $dataEnketoWithImage->first()->toArray()['grupo_datos_beneficiario/numero_identificacion_participante']

        //return view('pdf.formulario', ["data" => $dataEnketoWithImage->first()]);

        /* $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML('<h1>Test</h1>');
            return $pdf->stream(); */

        $dataEnketoWithImage->filter()->all();

        $dataEnketoWithImage->each(function (Collection $item) use ($timestart, $limit_minutes, $dataEnketoResponse) {

            $id_file = $item->get('_id');

            $filename = '/htmlToPdf/cash_echo/Acuerdo De Transferencia Monetarias - Cash ECHO_' . $id_file . '.pdf';

            if (!Storage::disk('local')->exists($filename)) {
                $pdf = Pdf::loadView('pdf.formulario', ["data" => $item]);
                $content = $pdf->download()->getOriginalContent();
                Storage::put($filename, $content);
            }

            $currentTimeExecuted = time() - $timestart;

            $limit_minutes_ajust = $limit_minutes - 100;
            echo $currentTimeExecuted . " > " . $limit_minutes_ajust . ' = ' . ($currentTimeExecuted > $limit_minutes_ajust) . "\n";

            if ($currentTimeExecuted > $limit_minutes_ajust) {
                $filesExported = Storage::files("/htmlToPdf/cash_echo/");
                echo "exportaciones totales" . count($dataEnketoResponse) . " \n";
                echo "exportaciones procesadas" . count($filesExported) . " \n";
                echo "exportaciones faltantes" . (count($dataEnketoResponse) - count($filesExported)) . " \n";

                return response()->json([
                    "exportaciones totales" => count($dataEnketoResponse),
                    "exportaciones procesadas" => count($filesExported),
                    "exportaciones faltantes" => count($dataEnketoResponse) - count($filesExported),
                ]);
            }
        });

        /* $resultCreated = helper::makeZipWithFiles("cash_echo.zip", $filesExported);
        
            if($resultCreated === true){
              return response()->download(public_path("cash_echo.zip"))->deleteFileAfterSend(true);
            }else {
              return response()->json(['status' => false, 'message' => $resultCreated], 503);
            } */
        if (count($dataEnketoResponse) == count($filesExported)) {

            $resultCreated = helper::makeZipWithFiles("cash_echo.zip", $filesExported);

            //$ramdom = Carbon\Carbon::now()->timestamp;
            //dd(Carbon\Carbon::now()->timestamp, time());

            if ($resultCreated === true) {
                return response()->download(public_path("cash_echo.zip"))->deleteFileAfterSend(true);
            } else {
                return response()->json(['status' => false, 'message' => $resultCreated], 503);
            }
        } else {

            $filesExported = Storage::files("/htmlToPdf/cash_echo/");

            return response()->json([
                "exportaciones totales" => count($dataEnketoResponse),
                "exportaciones procesadas" => count($filesExported),
                "exportaciones faltantes" => count($dataEnketoResponse) - count($filesExported)
            ]);
        }

        /* return $pdf->download('invoice.pdf'); */

        /* return response()
            ->view('pdf.formulario', ["data" => $dataEnketoWithImage->first()], 200)
            ->header('Authorization', 'Token ' . $token); */
        /* } catch (\Throwable $th) {
            

            $filesExported = Storage::files("/htmlToPdf/cash_echo/");

            return response()->json([
                "error" => $th,
                "exportaciones procesadas" => count($filesExported),
            ]);
        } */
    }

    /**
     * 8914355 8916210 "MPD"
     */
    public function getKoboSaved(Request $request)
    {

        $mmpds = MKoboRespuestas::whereHas('formulario', function ($q) use ($request) {
            $q->where('ACCION', '=', $request->ACCION);
        })
            ->where('_ID', '=', $request->_ID)
            ->limit(1000)
            ->get()
            ->load('pregunta')
            ->groupBy('_ID');

        if ($request->pagination) {
            $mmpdsArray = $this->paginateCollection($mmpds, 10);
        } else {
            $mmpdsArray = collect([]);

            $mmpdsValues = ($mmpds)->values();


            $mmpdsValues->each(function ($formulario) use ($mmpdsArray) {

                $objectPresuntaRespuesta = collect();
                //$formulario [{VALOR: "", pregunta: {ROTULO}}, {VALOR: "", pregunta: {ROTULO}}]
                $formulario->each(function ($respuesta) use ($objectPresuntaRespuesta) {
                    //dd($respuesta->VALOR, $respuesta->pregunta);

                    $objectPresuntaRespuesta[$respuesta->pregunta->CAMPO1] = $respuesta->VALOR;
                });

                $mmpdsArray->push($objectPresuntaRespuesta);
            });
        }

        return  $mmpdsArray;
    }

    public function getKoboWidthId($uui, $token)
    {

        $jsonurl = "https://kf.acf-e.org/assets/" . $uui . "/submissions/?format=json";

        $response = Http::withHeaders([
            'Authorization' => 'Token ' . $token,
            'Accept' => 'application/json'
        ])
            ->get($jsonurl)
            ->json();

        $dataSubdmissions = collect($response);

        //obtener los labes

        //https://kc.acf-e.org/api/v1/forms?id_string=a4E3J9gkULZe5eRqQph8zh
        $jsonurlform = "https://kc.acf-e.org/api/v1/forms?id_string=" . $uui;

        $dataForm = Http::withHeaders([
            'Authorization' => 'Token ' . $token . '',
            'Accept' => '*/*'
        ])
            ->get($jsonurlform)
            ->json();

        $formid = collect($dataForm[0])->get('formid');

        //https://kc.acf-e.org/api/v1/forms/2433/form.json
        $jsonurlDataLabels = "https://kc.acf-e.org/api/v1/forms/" . $formid . "/form.json";

        $dataDataLabelsResponse = Http::withHeaders([
            'Authorization' => 'Token ' . $token . '',
            'Accept' => 'application/json'
        ])
            ->get($jsonurlDataLabels)
            ->json();

        $dataLabels = collect($dataDataLabelsResponse);

        $index = 0;
        $formated = $dataSubdmissions->map(function ($submission) use ($dataLabels, $index) {

            $submission['_index'] = $submission['_id'];
            $index++;
            //dd("submission", $submission);//224

            $dataLabelsCollection = collect($dataLabels);

            //dd("dataLabels", $dataLabelsCollection->get("children")[6]['name']);

            //[
            // * "pregunta" => "respuesta",
            // * "pregunta2" => "respuesta2",
            // * ]
            // *

            /**
             * "name" => "valoracion_seguimiento_ninos_as"
             *  "bind" => array:1 [ …1]
             *   "label" => "Valoración y seguimiento médico nutricional de niños y niñas"
             */
            $dataLabelsChildren = collect($dataLabelsCollection->get("children"));
            //dd("dataLabelsChildren", $dataLabelsChildren);
            //dd($keys, $values);

            $submissionFormated = collect($submission)->flatMap(function ($valueSub, $keySub) use ($dataLabelsChildren, $submission) {

                if ($keySub == "detalle_compra_acciones_partic") {
                    $valueSubCollect = collect($valueSub);
                    $valueSubMap = $valueSubCollect->map(function ($value) use ($submission) {
                        $value['_parent_index'] = $submission['_index'];
                        return $value;
                    });
                    $valueSub = $valueSubMap->toArray();
                    //dd("itemSub detalle_compra_acciones_partic", $valueSub, $keySub);
                }

                $collectionName = collect(explode('/', $keySub));

                $itemKeyFiltered = $dataLabelsChildren->filter(function ($item) use ($collectionName) {
                    //echo $item['name'] . '--' . json_encode( explode('/', $keySub)) . '----------\n';

                    //dd(($collectionName)->first(), ($collectionName)->last());

                    $itemCollection = collect($item);

                    //dd($item['name'] .  $collectionName->first());//->get("children")

                    if (count($collectionName) > 0 && optional($itemCollection)->get("children")) {

                        $children2 = collect(optional($itemCollection)->get("children"));

                        //dd("children2", $children2);

                        $children2Fortmat = $children2->map(function ($chield) {
                            $children2Collect = collect($chield); //->forget('name');
                            return $children2Collect['name'];
                        });

                        $children2FortmatCollect = collect($children2Fortmat);

                        return ($collectionName->first() == $item['name'] && $children2FortmatCollect->search($collectionName->last())) !== false;
                    }

                    return ($item['name'] == $collectionName->first()) !== false;
                });

                $itemKeyFilteredCollect = collect(collect($itemKeyFiltered)->first());
                //dd("itemKeyFilteredCollect", $itemKeyFilteredCollect->get('label'));

                $children2Label = '';

                if (count($collectionName) > 0 && optional($itemKeyFilteredCollect)->get("children")) {

                    $children2Collect = collect(optional($itemKeyFilteredCollect)->get("children"));
                    //dd("children2", $children2, $collectionName->last());

                    $children2FortmatCollectFiltered = $children2Collect
                        ->filter(function ($children2) use ($collectionName) {
                            return $children2['name'] == $collectionName->last();
                        })->first();

                    //dd($children2FortmatCollectFiltered['label']);

                    $children2Label = isset($children2FortmatCollectFiltered['label']) ? $children2FortmatCollectFiltered['label'] : $collectionName->last();
                }

                $itemSub = collect([
                    optional($itemKeyFilteredCollect)->get('label') ? optional($itemKeyFilteredCollect)->get('label') . '/' . $children2Label : $keySub => $valueSub
                ]);

                return $itemSub;
            });

            //dd("submissionFormated", $submissionFormated); //224

            /* for ($i = 0; $i < count($keys); $i++) {
                    $keysCurrent = $keys[$i];
                    $valuesCurrent = $values[$i];
    
                    $indexLabelsChildren = $dataLabelsChildren->filter(function ( $item, int $key) use ($keysCurrent) {
                        return strpos($keysCurrent, $item['name'])>=0;
                    });
                    
                    dd($indexLabelsChildren->first());
    
                    $submissionFormated[] = [
    
                    ];
                } */

            //dd($submission);


            //$submission->valoracion_seguimiento_ninos_as

            //$submission[] = $submissionFormated;



            return $submissionFormated;
        });

        return $formated;
    }

    /**
     * se utiliza para actualizar en este caso los perfiles territoriales en base a una columna editada
     * params identificacion/Corregimiento_consejo_vereda 
     */
    function puKoboMireView($uui, $token)
    {


        $jsonurl = "https://kf.acf-e.org/assets/" . $uui . "/submissions/?format=json";

        $response = Http::withHeaders([
            'Authorization' => 'Token ' . $token,
            'Accept' => 'application/json'
        ])
            ->get($jsonurl)
            ->json();

        $dataSubdmissions = collect($response); //18
        $dataSubdmissions = collect($dataSubdmissions->filter(function ($record) {
            if (strpos($record['identificacion/Corregimiento_consejo_vereda'], '-') >= 0) {
                return  $record;
            }
        })->values());

        //despues consulta del mire los registros que corresponden de firebbird a los perfiles territoriales para comparar y actualizar

        DB::setDefaultConnection('firebird');

        $resultados = DB::select("select  * from V_M_KOBO_RESPUESTAS_RTPT");
        //$resultados = DB::select("select CODIGO, ESTAT, cast(cast(DPTO as blob sub_type text character set ISO8859_1) as varchar(2000)) DEPARTAMENTO, cast(cast(MUNICIP as blob sub_type text character set ISO8859_1) as varchar(2000)) MUNICIP, cast(cast(ESTADO_EMERGENCIA as blob sub_type text character set ISO8859_1) as varchar(2000))ESTADO_EMERGENCIA, cast(cast(TIPO_EMERGENCIA as blob sub_type text character set ISO8859_1) as varchar(2000)) TIPO_EMERGENCIA, cast(cast(fecha_evento as blob sub_type text character set ISO8859_1) as varchar(2000)) fecha_evento, cast(cast(FECHA_ALERTA as blob sub_type text character set ISO8859_1) as varchar(2000)) FECHA_ALERTA from ( select CODIGO, ESTAT, ESTADO_EMERGENCIA,TIPO_EMERGENCIA,M_KOBO_RESPUESTAS.XVALOR fecha_evento,IDFORM, FECHA_RECEPCION,MUNICIP,FECHA_ALERTA,DPTO from ( SELECT CODIGO, ESTAT, M_KOBO_RESPUESTAS.XVALOR FECHA_ALERTA, ESTADO_EMERGENCIA,TIPO_EMERGENCIA, IDFORM, FECHA_RECEPCION,MUNICIP,DPTO FROM( SELECT CODIGO, ESTAT, M_KOBO_RESPUESTAS.XVALOR ESTADO_EMERGENCIA,TIPO_EMERGENCIA, IDFORM, FECHA_RECEPCION,MUNICIP,DPTO FROM( SELECT M_KOBO_RESPUESTAS.XVALOR TIPO_EMERGENCIA, m_kobo_formularios.xCODIGO_ALERTA CODIGO, m_kobo_formularios.fecha FECHA_RECEPCION, M_KOBO_FORMULARIOS.MUNICIPIO MUNICIP, M_KOBO_FORMULARIOS.DEPARTAMENTO DPTO, M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS IDFORM, m_kobo_formularios.ESTATUS ESTAT FROM M_KOBO_RESPUESTAS INNER JOIN M_KOBO_FORMULARIOS ON M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS=M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001475' and m_kobo_formularios.id_m_formularios='0011') INNER JOIN M_KOBO_RESPUESTAS ON IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='0012173') INNER JOIN M_KOBO_RESPUESTAS ON IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001428') INNER JOIN M_KOBO_RESPUESTAS ON IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001477')        ");

        $resultados = helper::convert_from_latin1_to_utf8_recursively($resultados);

        $resultados_mireview = collect($resultados);

        $dataSubdmissions->each(function ($kobo_rt) use ($dataSubdmissions, $resultados_mireview) {
            //dd($xcodigo_alerta);"NARI_MAGUI"
            $xcodigo_alerta_str = $kobo_rt['identificacion/Corregimiento_consejo_vereda'];

            //sacar UGI && altaque solo && los que no tengan guion

            if (strpos($xcodigo_alerta_str, '-') >= 0) {
                $xcodigo_alerta_kobo = explode('-', $xcodigo_alerta_str)[1];

                //dd($xcodigo_alerta_kobo);"NARI_MAGUI"

                //XCODIGO_ALERTA
                $resultados_mireview->each(function ($rt_firebird) use ($xcodigo_alerta_kobo, $dataSubdmissions, $resultados_mireview) {

                    //$rt_firebird->XCODIGO_ALERTA RT-NARI-3.1

                    $xcodigo_alerta_depmun = explode('_', $xcodigo_alerta_kobo)[0];

                    if (count(explode('-', $rt_firebird->XCODIGO_ALERTA)) <= 1) {
                        //if($rt_firebird->XCODIGO_ALERTA !== "NARI_CUMBAS")
                        //dd("rt_firebird->XCODIGO_ALERTA", explode('-', $rt_firebird->XCODIGO_ALERTA));
                        return true;
                    }

                    $xcodigo_alerta_depmun2 =  explode('-', $rt_firebird->XCODIGO_ALERTA)[1];

                    if (count(explode('_', $xcodigo_alerta_kobo)) <= 1) {
                        //if($xcodigo_alerta_kobo !== "NARI_CUMBAS")
                        //    dd("xcodigo_alerta_kobo", explode('-', $xcodigo_alerta_kobo));
                        return true;
                    }

                    $xcodigo_alerta_region = explode('_', $xcodigo_alerta_kobo)[1];
                    $xcodigo_alerta_region2 = $this->getCodeRegionFromRtFirebird($rt_firebird, $dataSubdmissions, $resultados_mireview);

                    //dd($xcodigo_alerta_depmun, $xcodigo_alerta_depmun2, $xcodigo_alerta_region, $xcodigo_alerta_region2);

                    if ($xcodigo_alerta_depmun == $xcodigo_alerta_depmun2 && $xcodigo_alerta_region == $xcodigo_alerta_region2) {
                        // aplicar el registro a la respuesta
                        $xcodigo_alerta = $xcodigo_alerta_depmun . '_' . $xcodigo_alerta_region;

                        //dd($rt_firebird->XCODIGO_ALERTA, $xcodigo_alerta, $rt_firebird->ID_M_KOBO_RESPUESTAS);

                        //actualizar registro de mir de la respuesta

                        DB::select("update M_KOBO_FORMULARIOS set XCODIGO_ALERTA = '" . $xcodigo_alerta . "' WHERE ID_M_KOBO_FORMULARIOS = '" . $rt_firebird->ID_M_KOBO_FORMULARIOS . "'");
                    }
                });
            }
        });


        return [
            "kobo_updated" => $dataSubdmissions,
            "rt_mireview_firebird" => $resultados,
        ];
    }


    function getCodeRegionFromRtFirebird($rtrecord_current, $rtrecords_kobo, $resultados_mireview)
    {
        $cod_region = '';

        //XCODIGO_ALERTA [1]
        //"VALOR": "Altaquer",

        //"ROTULO": "Corregimiento_consejo_vereda",
        //"ID_M_KOBO_FORMULARIOS": "0014252",
        $formulariokobo_region = $resultados_mireview->filter(function ($form) use ($rtrecord_current) {

            if ($form->ID_M_KOBO_FORMULARIOS == $rtrecord_current->ID_M_KOBO_FORMULARIOS && $form->ROTULO  == "Corregimiento_consejo_vereda") {
                return $form->VALOR;
            }
        });

        $formulariokobo_region = collect($formulariokobo_region->values());

        if (count($formulariokobo_region) <= 0) {
            return null;
        }

        $cod_region_str = $formulariokobo_region[0]->VALOR;

        $cod_region = $this->getCodeKoboByRegion($cod_region_str, $rtrecords_kobo);

        //buscar el codigo segun el formulario de kobo para extraer el kobo codigo
        // funcion para extraer el codigo por region del formulario de kobo

        return $cod_region;
    }

    function getCodeKoboByRegion($cod_region_str, $rtrecords_kobo)
    {
        $cod_region = '';

        $rtrecords_kobo_code = $rtrecords_kobo->filter(function ($record_kobo) use ($cod_region_str) {
            $r_kobo_str_full = trim(strtoupper($this->eliminar_acentos($record_kobo['identificacion/Corregimiento_consejo_vereda'])));
            $r_cod_region_str = trim(strtoupper($this->eliminar_acentos($cod_region_str)));

            $r_kobo_str = trim(explode('-', $r_kobo_str_full)[0]);

            //if(stripos($r_kobo_str, 'GARCIA') && stripos($r_cod_region_str, 'GARCIA'))
            //    dd($r_kobo_str, $r_cod_region_str);

            if ($r_kobo_str == $r_cod_region_str) {
                return $record_kobo;
            }
        });

        $rtrecords_kobo_code = collect($rtrecords_kobo_code->values());

        if (count($rtrecords_kobo_code) <= 0) {
            return null;
        }

        $cod_region_str = $rtrecords_kobo_code[0]['identificacion/Corregimiento_consejo_vereda'];

        if (count(explode('_', $cod_region_str)) <= 1) {
            return null;
        }

        $cod_region = explode('_', $cod_region_str)[1];

        return $cod_region;
    }

    function exportTemplateByid(Request $request)
    {

        $items = [];
        $dominioTitle =  $request->dominio == 'kf.acf-e.org' ? 'kc.acf-e.org' : ($request->dominio == 'eu.kobotoolbox.org' ? 'kc-eu.kobotoolbox.org' :  $request->dominio);

        $formid = $request->uui;
        $token = $request->token;

        //params 
        //formulario en general
        $jsonurlDataTitle = "https://" . $dominioTitle . "/api/v1/forms?id_string=" . $formid;

        $dataTitleResponse = Http::withHeaders([
            'Authorization' => 'Token ' . $token . '',
            'Accept' => 'application/json'
        ])
            ->get($jsonurlDataTitle)
            ->json();

        $formdata = json_decode(json_encode(collect($dataTitleResponse)->first()), FALSE);

        //dd($formdata->title, $formdata->metadata, $formdata);

        /* $name_fomulary = "fallo nombre";
        //titulo del formulario
        if (count($dataTitleResponse) > 0) {
            $name_fomulary = collect($dataTitleResponse[0])['title'];
        } */

        //sacar data en tablas
        /* $jsonurlDataEnketo = "https://kc.acf-e.org/api/v1/data/" . $formdata->formid;
        //'timeout' => 1200,  //1200 Seconds is 20 Minutes

        $items = Http::withHeaders([
            'Authorization' => 'Token ' . $token . '',
            'Accept' => 'application/json'
        ])
            ->get($jsonurlDataEnketo)
            ->json(); */

        $itamsWithLabes =  $this->getKoboLabels($formid, $token, $dominioTitle);

        //dd("itamsWithLabes", $itamsWithLabes->first());

        $itemsCollect = collect(
            collect(
                $itamsWithLabes
            )
                //->where("_uuid", "349b79d4-6c2a-4917-9aaf-d8cb1b32c2b8")//3e49d109-a5f2-492c-b104-d94ceb7edfdf
                ->first()
        )->sortKeys(); //json_decode(json_encode), FALSE);

        //dd("itemsCollect", $itemsCollect->keys());
        //mostrar los radios

        $dataMetaWithImage = [];
        /* (collect($formdata->metadata)->map(function ($chield) use ($token) {

            $metaF = ($chield); //->forget('name');

            $imageMetaResponse = Helper::getImageWithHeaders($metaF->url, $token);

            $metaF->data_file = $imageMetaResponse ?? $metaF->data_file;

            return $metaF;
        })); */

        return view('pdf.formulario', ["data" => $itemsCollect, "filename" => "fillename", "metaFilesForm" => $dataMetaWithImage]);
    }
}
