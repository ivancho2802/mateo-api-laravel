<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MTipoClientes extends Model
{
    use HasFactory;

    //use HasFactory, SoftDeletes;

    protected $table = 'M_TIPO_CLIENTES';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        "ID_M_TIPO_CLIENTES",
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
        "CODIGO1",
        "CONTABLE1",
        "EXCLUIR",
        "ESTATUS",
        "FACTOR1",
        "FACTOR2",
        "CONDICION1",

        //RELACIONALAES
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        "ID_M_CENTRO_COSTOS"
        //RELACIONALAES
    ];

    /* CONSTRAINT PK_M_TIPO_CLIENTES:
    Primary key (ID_M_TIPO_CLIENTES)
    CONSTRAINT UK_ID_M_TIPO_CLIENTES:
    Unique key (ID, ID_EMPRESA)

    Triggers on Table M_TIPO_CLIENTES:
    T_ID_M_TIPO_CLIENTES, Sequence: 0, Type: BEFORE INSERT, Active
    T_F_M_TIPO_CLIENTES, Sequence: 0, Type: BEFORE UPDATE, Active
    T_M_TIPO_CLIENTES_FACTOR, Sequence: 0, Type: AFTER UPDATE, Active
    T_M_TIPO_CLIENTES_CONTROL, Sequence: 0, Type: BEFORE DELETE, Inactive */
}
