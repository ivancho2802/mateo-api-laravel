<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MGrupos extends Model
{
    use HasFactory;

    protected $table = 'M_GRUPOS';

    
    protected $fillable = [

        "ID_M_GRUPOS",
        "NOMBRES", 
        "ID_M_USUARIOS", 
        "ID_M_AREAS", 
        "FECHA", 
        "ACCION", 
        "UNICO", 
        "BARCODE", 
        "ID", 
        "ID_EMPRESA", 
        "CAMPO1", 
        "CAMPO2", 
        "CAMPO3", 
        "CAMPO5", 
        "CAMPO5", 
        "FECHA_REGISTRO", 
        "ESTATUS", 
        /* 
        CONSTRAINT PK_M_GRUPOS:
        Primary key (ID_M_GRUPOS)
        CONSTRAINT UK_ID_M_GRUPOS:
        Unique key (ID, ID_EMPRESA)

        Triggers on Table M_GRUPOS:
        T_ID_M_GRUPOS, Sequence: 0, Type: BEFORE INSERT, Active
        T_F_M_GRUPOS, Sequence: 0, Type: BEFORE UPDATE, Active
        T_M_GRUPOS_CONTROL, Sequence: 0, Type: BEFORE DELETE, Inactive */
    ];


}
