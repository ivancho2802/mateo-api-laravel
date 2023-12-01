<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MLocalidades extends Model
{
    use HasFactory;

    protected $table = 'M_LOCALIDADES';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        "ID_M_LOCALIDADES",
        "FECHA",
        "FECHA_REGISTRO",
        "ACCION",
        "UNICO",
        "BARCODE",
        "ID",
        "CAMPO1",
        "CAMPO2",
        "CAMPO3",
        "CAMPO4",
        "CAMPO5",
        "ESTATUS",
        "DEPARTAMENTO",
        "MUNICIPIO",
        "REGION",

        "ID_EMPRESA",
        "ID_M_USUARIOS",
        "ID_M_AREAS",
    ];

    /* 
    CONSTRAINT PK_M_LOCALIDADES:
    Primary key (ID_M_LOCALIDADES)
    CONSTRAINT UK_ID_M_LOCALIDADES:
    Unique key (ID, ID_EMPRESA)

    Triggers on Table M_LOCALIDADES:
    T_ID_M_LOCALIDADES, Sequence: 0, Type: BEFORE INSERT, Active
    T_F_M_LOCALIDADES, Sequence: 0, Type: BEFORE UPDATE, Active 
    */
}
