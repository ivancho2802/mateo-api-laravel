<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kobo extends Controller
{
    //
    public function getKoboLabels($uui, $token)
    {

        //dd($uui, $token);

        $jsonurl = "https://kf.acf-e.org/assets/" . $uui . "/submissions/?format=json";

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
                        return strpos($keysCurrent, $item['name']);
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
}
