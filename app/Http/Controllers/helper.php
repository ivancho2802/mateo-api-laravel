<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $result = (array_filter($array, function($value) { return !is_null($value) && $value !== ''; }));

        return count($result);
    }
}
