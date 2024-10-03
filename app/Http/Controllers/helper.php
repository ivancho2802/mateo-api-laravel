<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use ZipArchive;

class helper extends Controller
{
    //
    /**
     * Encode array from latin1 to utf8 recursively
     * @param $dat
     * @return array|string
     */
    public static function convert_from_latin1_to_utf8_recursively($dat)
    {
        if (is_string($dat)) {
            return mb_convert_encoding($dat, 'UTF-8', 'ISO-8859-2');
        } elseif (is_array($dat)) {
            $ret = [];
            foreach ($dat as $i => $d) $ret[$i] = self::convert_from_latin1_to_utf8_recursively($d);
            return $ret;
        } elseif (is_object($dat)) {
            foreach ($dat as $i => $d) $dat->$i = self::convert_from_latin1_to_utf8_recursively($d);
            return $dat;
        } else {
            return $dat;
        }
    }

    public static function extactHash($url)
    {
        $hashArray = explode("/", $url);
        $hash = $hashArray[4];

        return $hash;
    }


    /*
        el objetivo es extraer el valor apartir de una key aprox
        group_pf9su00\/_3b_Fecha_del_Monitoreo
     */
    public static function getValue($object, $preindex)
    {

        $keys = array_keys((array)$object);


        $key   = key(array_filter($keys, function ($x) use ($preindex) {
            return false !== stripos($x, $preindex);
        }));

        $elementDetected = $keys[$key];

        $valueDetected = $object->$elementDetected;

        return $valueDetected;
    }

    /**
     * funcion para obtener los label desde el array children de v1 de kobo
     */

    public static function getValueLabels($children, $key)
    {
        $level_keys = explode("/", $key);

        $collection = collect($children);

        /**
         * collection
         * 
         [
            "name" => "Permiso_de_uso_de_da_y_de_uso_de_im_genes"
            "label" => "Permiso de uso de datos personales y de uso de imágenes"
            "type" => "group"
            "bind" => array:2 [▶]
            "children" => array:4 [▶]
        ]
         */

        //dd("collection", $collection,   "collectionsecc2", collect($collection[7]['children']) );

        $filtered = $collection->filter(function ($value) use ($level_keys, $key) {
            $children_dynamic = $value["name"];

            if (count($level_keys) > 0) {

                $key_search = $level_keys[0];

                $valid = $children_dynamic == $key_search;
            } else {
                $valid = $children_dynamic == $key;
            }

            return $valid;
        });

        $filtered = $filtered->all();

        //dd($filtered->first());

        if (count($level_keys) == 1) {
            //dd(collect($filtered)->first());

            $valueDetected = optional(collect($filtered)->first())["label"];
            return $valueDetected;
        }
        //echo collect($filtered)->first()["label"];

        $mapped = collect($filtered)->map(function ($value2) use ($level_keys, $key) {

            //dd("value", $value2, "name", $value2["name"] );
            $new_key = '';

            $valid = false;
            $children_dynamic = collect();

            for ($i = 0; $i < count($level_keys); $i++) {
                $key_search = $level_keys[$i];

                if ($i == 0) {
                    //echo  $value2["name"] . " - " . $key_search;
                    $str_label = $value2["label"];
                    //dd(json_encode($value2["label"]),$key_search, $value2["label"]);
                    $new_key .= $str_label . '/';

                    $children_dynamic = collect($value2['children']);

                    continue;
                }

                $children_dynamic = $children_dynamic->filter(function ($value3) use ($key_search) { 
                    $valid = $value3["name"] == $key_search;
                    return $valid;
                });

                //dd("children_dynamic", collect($children_dynamic)->first()['label']);

                //echo  collect($children_dynamic)->first()['label'] . " - " . $key_search;

                $new_key .=  collect($children_dynamic)->first()['label'] . '/';

                if (count($level_keys) - 1 !== $i) {
                    $children_dynamic = collect(collect($children_dynamic)->first()['children']);
                }
            }

            /* if($valid!==false){
                    dd("new_key", $new_key);
                } */

            //$valid = collect(collect($value)->keys()->all())->search($key);
            return $new_key;
        });

        
        $valueDetected = $mapped->first();
        //dd($valueDetected);

        return $valueDetected;
    }


    /**
     * el objetivo es sacar del elemento del json de kobo sus preguntas y respuestas con funcion keys y values
     * pero solo que tengan el flag "\/_" 
     * mas las observaciones que es _OBSERVACIONES
     */

    public static function formatObject($object, $preindex)
    {

        $values = array_values((array)$object);
        $keys = array_keys((array)$object);

        $respuestas = [];
        $preguntas = [];

        for ($i = 0; $i < count($keys); $i++) {

            $pregunta = $keys[$i];
            $respuesta = $values[$i];

            //if (false !== stripos($pregunta, $preindex)) {// || $pregunta == "_OBSERVACIONES" || $pregunta == "_id"
            array_push($preguntas, $pregunta);
            array_push($respuestas, $respuesta);
            //}
        }

        /* $preguntas = array_map(function ($x) use ($preindex) {
            $partsQuestion = explode($preindex, $x);
            return end($partsQuestion);
        }, $preguntas); */

        return ["preguntas" => $preguntas, "respuestas" => $respuestas];
    }

    /**
     * count element not null into array
     */

    public static function countValidValues($object)
    {
        $array = array_values((array)$object);
        //$values = array_values((array)$array);
        //$result = array_filter($array, fn ($value) => !is_null($value[0]));
        $result = (array_filter($array, function ($value) {
            return !is_null($value) && $value !== '';
        }));

        return count($result);
    }

    /**
     * para convertir las imagenes en response con headers
     */
    public static function getImageWithHeaders($url, $token)
    {
        try {
            ini_set('default_socket_timeout', 900); // 900 Seconds = 15 Minutes
            // Create a stream
            $opts = [
                "http" => [
                    "method" => "GET",
                    "header" => "Authorization: Token " . $token . "\r\n" .
                        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7" . "\r\n" .
                        "Cookie: foo=bar\r\n",
                    //'timeout' => 1200,  //1200 Seconds is 20 Minutes
                ]
            ];

            // DOCS: https://www.php.net/manual/en/function.stream-context-create.php
            $context = stream_context_create($opts);
            //dd("contents", $url, $token);

            $contents = file_get_contents($url, false, $context);

            if (!$contents) {
                return '';
            }

            //dd("contents", $contents);

            $imageData = base64_encode($contents);

            $mimeType = self::detectMimeType($imageData) ?? "image/undefined"; //mime_content_type($contents)

            // Format the image SRC: data:{mime};base64,{data}; 
            $src = 'data:' . $mimeType . ';base64,' . $imageData;

            return $src;
        } catch (\Throwable $th) {
            //throw $th;
            return $url;
        }
    }

    public function detectMimeType($b64)
    {

        $signatures = [
            "JVBERi0" => "application/pdf",
            "R0lGODdh" => "image/gif",
            "R0lGODlh" => "image/gif",
            "iVBORw0KGgo" => "image/png",
            "//9j//" => "image/jpg"
        ];

        $keys = array_keys($signatures);
        //$values = array_values($signatures);

        foreach ($keys as &$s) {
            if (strpos($b64, $s) === 0) {
                return $signatures[$s];
            }
        }
    }

    public static function makeZipWithFiles(string $zipPathAndName, array $filesAndPaths)
    {
        $zip = new ZipArchive;
        $zipFileName = $zipPathAndName;

        $filesToZip = collect($filesAndPaths)->map(function ($item) {
            return storage_path("/app/" . $item);
        });

        if ($zip->open(public_path($zipFileName), ZipArchive::CREATE) === TRUE) {

            /* $filesToZip = [
                public_path('file1.txt'),
                public_path('file2.txt'),
            ]; */

            $filesToZip->each(function ($file) use ($zip) {
                $zip->addFile($file, basename($file));
            });

            $zip->close();

            return true;

            //return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
        } else {
            return "Failed to create the zip file.";
        }
    }
}
