<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MAreas extends Model
{
    use HasFactory;


    protected $table = 'M_AREAS';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        "ID_M_AREA",
        
        "NOMBRES",
        "IMAGEN",
        //relacion
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        "ID_EMPRESA",
        //relacion
        "FECHA",
        "ACCION",
        "UNICO",
        "BARCODE",
        "ID",
        "CAMPO1",
        "CAMPO2",
        "CAMPO3",
        "CAMPO4",
        "CAMPO5",
        "FECHA_REGISTRO",
        "CAMARA_IP",
        "CAMARA_NUMERO",
        "GRUPO",
        "ESTATUS",
    ];

    /* 
    CONSTRAINT INTEG_144:
    Primary key (ID_M_AREA)
    CONSTRAINT UK_ID_M_AREAS:
    Unique key (ID, ID_EMPRESA)

    Triggers on Table M_AREAS:
    T_ID_M_AREAS, Sequence: 0, Type: BEFORE INSERT, Active
    T_F_M_AREAS, Sequence: 0, Type: BEFORE UPDATE, Active 
    */
}
