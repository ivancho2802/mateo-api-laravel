<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MNiveles extends Model
{
    use HasFactory;

    protected $table = 'M_NIVELES';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        "ID_M_NIVELES",
        "NOMBRES",
        "NIVEL",
        "FECHA",
        "ACCION",
        "UNICO",
        "BARCODE",
        "ID",
        "ID_EMPRESA",
        "CAMPO1",
        "CAMPO2",
        "CAMPO3",
        "CAMPO4",
        "CAMPO5",
        "FECHA_REGISTRO",
        "ID_M_MENU",
        "CLAVE",
        "ESTATUS",

        //RELACIOBNALES
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        //RELACIOBNALES

        /* ,
        CONSTRAINT FK_M_NIVELES_M_MENU:
        Foreign key (ID_M_MENU)    References M_MENU (ID_M_MENU)
        CONSTRAINT INTEG_254:
        Primary key (ID_M_NIVELES)

        Triggers on Table M_NIVELES:
        T_ID_M_NIVELES, Sequence: 0, Type: BEFORE INSERT, Active
        T_F_M_NIVELES, Sequence: 0, Type: BEFORE UPDATE, Active
        T_M_NIVELES_INS, Sequence: 0, Type: AFTER INSERT OR UPDATE, Active */
    ];
}
