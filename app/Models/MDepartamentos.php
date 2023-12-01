<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDepartamentos extends Model
{
    use HasFactory;

    protected $table = 'M_DEPARTAMENTOS';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        "ID_M_DEPARTAMENTOS",
        
        "NOMBRES",
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
        "ESTATUS",
        "CODIGO1",
        "COMENTARIOS",

        "ID_M_CENTRO_COSTOS",
        "ID_M_USUARIOS",
        "ID_M_AREAS",
    ];

    /* CONSTRAINT FK_M_DEPARTAMENTOS_M_CENTRO_COS:
    Foreign key (ID_M_CENTRO_COSTOS)    References M_CENTRO_COSTOS (ID_M_CENTRO_COSTOS)
    CONSTRAINT PK_M_DEPARTAMENTOS:
    Primary key (ID_M_DEPARTAMENTOS)
    CONSTRAINT UK_ID_M_DEPARTAMENTOS:
    Unique key (ID, ID_EMPRESA)

    Triggers on Table M_DEPARTAMENTOS:
    T_ID_M_DEPARTAMENTOS, Sequence: 0, Type: BEFORE INSERT, Active
    T_F_M_DEPARTAMENTOS, Sequence: 0, Type: BEFORE UPDATE, Active
    T_M_DEPARTAMENTOS_CENTRO_COS, Sequence: 0, Type: AFTER UPDATE, Active
    T_M_DEPARTAMENTOS_CONTROL, Sequence: 0, Type: BEFORE DELETE, Inactive */
}
