<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

            $mimeType = self::detectMimeType($imageData) ?? "image/jpg"; //mime_content_type($contents)

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
}
