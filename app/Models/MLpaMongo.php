<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
//use MongoDB\Laravel\Eloquent\Model;

//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\DocumentModel;

use Jenssegers\Mongodb\Eloquent\Model;

class MLpaMongo extends Model
{
    protected $fillable = [

        "ID_M_KOBO_FORMULARIOS",
        "_ID", //relacionado al id de la respuesta del usuario

        "FECHA",
        "FECHA_REGISTRO",
        "ACCION",
        "UNICO",
        "BARCODE",
        "id",
        "ID",
        "ID_EMPRESA",
        "CAMPO1",
        "CAMPO2",
        "CAMPO3",
        "CAMPO4",
        "CAMPO5",
        "ESTATUS",
        "FECHA_FORMULARIO",
        "UID",
        "FUID",
        "CORREO_TEST",
        "FECHA_ESTADISTICA",
        "DEPARTAMENTO",
        "REGION",
        "CORREO",
        "FUNICO",
        "MUNICIPIO",
        "CODIGO_ALERTA",
        "XCODIGO_ALERTA",
        "PREFIJO_ALERTA",

        //RELACIONALES
        "ID_M_LOCALIDADES",
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        "ID_M_FORMULARIOS",
        //RELACIONALES

    ];
}
