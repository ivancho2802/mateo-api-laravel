<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MZonas extends Model
{
    use HasFactory;

    protected $table = 'M_ZONAS';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        "ID_M_ZONAS",

        "FECHA",
        "FECHA_REGISTRO",
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
        "NOMBRES",
        "ESTATUS",
        "COMISION1",
        "COMISION2",
        "COMISION3",
        
        "ID_M_USUARIOS",
        "ID_M_AREAS"

        /* CONSTRAINT PK_M_ZONAS:
        Primary key (ID_M_ZONAS)
        CONSTRAINT UK_ID_M_ZONAS:
        Unique key (ID, ID_EMPRESA)

        Triggers on Table M_ZONAS:
        T_ID_M_ZONAS, Sequence: 0, Type: BEFORE INSERT, Active
        T_F_M_ZONAS, Sequence: 0, Type: BEFORE UPDATE, Active */
    ];
}
