<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DErrores extends Model
{
    use HasFactory;

    protected $table = 'D_ERRORES';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "ID_P_FORMULARIOS",
        //relacionales
        "ID_D_ERRORES",
        "ID_M_AREAS",
        "ID_M_USUARIOS",
        "ID_M_USUARIOS2",
        //relacionales

        "IP",
        "URL",
        "COMENTARIOS",
        "ERRORES",
        "ESTATUS",
        "FECHA",
        "FECHA_REGISTRO",
        "ACCION",
        "UNICO",
        "BARCODE",
        "ID",
        "ID_EMPRESA",
        "TMP",
    ];
    /* Triggers on Table D_ERRORES:
        T_ID_D_ERRORES, Sequence: 0, Type: BEFORE INSERT, Active
    T_F_D_ERRORES, Sequence: 0, Type: BEFORE UPDATE, Active */
}
