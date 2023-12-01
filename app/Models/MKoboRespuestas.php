<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MKoboRespuestas extends Model
{
    use HasFactory;


    protected $table = 'M_KOBO_RESPUESTAS';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //relacionales
        "ID_M_KOBO_RESPUESTAS",

        "ID_M_USUARIOS",
        "ID_M_AREAS",
        "ID_M_KOBO_FORMULARIOS",
        "ID_M_FORMULARIOS",
        "ID_P_FORMULARIOS",
        //NO EXISTE
        "ID_TMP_RESPUESTAS",
        //relacionales

        "ID",
        "ID_EMPRESA",
        "UID",
        "FUID",
        "FECHA",
        "FECHA_REGISTRO",
        "ACCION",
        "UNICO",
        "BARCODE",
        "CAMPO1",
        "CAMPO2",
        "CAMPO3",
        "CAMPO4",
        "CAMPO5",
        "ESTATUS",
        "TIPO",
        "VALOR_N",
        "VALOR_F",
        "REFERENCIA",
        "ROTULO_NEW",
        "VALOR_C_NEW",
        "XVALOR_NEW",
        "XROTULO_NEW",
        "VALOR_NEW",
        "VALOR",
        "XVALOR",
        "VALOR_C",
        "ROTULO",
        "XROTULO",

        /* Triggers on Table M_KOBO_RESPUESTAS:
        T_ID_M_KOBO_RESPUEST, Sequence: 0, Type: BEFORE INSERT, Active
        T_M_KOBO_RESPUESTASNARI, Sequence: 91, Type: BEFORE INSERT, Active
        M_KOBO_RESPUESTAS_BI1, Sequence: 92, Type: BEFORE INSERT, Active
        T_F_M_KOBO_RESPUESTA, Sequence: 0, Type: BEFORE UPDATE, Active
        T_MAYUSCULAS, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active
        T_M_KOBO_RESPUESTAS_VALOR_F, Sequence: 3, Type: BEFORE INSERT OR UPDATE, Active
        M_KOBO_RESPUESTAS_ESTADISTICA, Sequence: 90, Type: BEFORE INSERT OR UPDATE, Active
        T_M_KOBO_RESPUESTAS_ACTUALIZA, Sequence: 100, Type: AFTER INSERT OR UPDATE, Active */

    ];
}
