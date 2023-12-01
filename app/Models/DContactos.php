<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DContactos extends Model
{
    use HasFactory;
    //use HasFactory, SoftDeletes;

    protected $table = 'D_CONTACTOS';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "ID_P_FORMULARIOS",
        //RELACIONALES
        "ID_D_CONTACTOS",
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        "ID_M_CONTACTOS",
        "ID_EMPRESA",
        "ID_M_USUARIO",
        //RELACIONALES
        "IDX",
        "TABLA",
        "NOMBRES",
        "APELLIDOS",
        "CODIGO1",
        "CARGO",
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
        "TELEFONO",
        "TIPO",
        "PARENTESCO",
        "EMPRESA",
        "TELEFONO_FIJO",
        "CANAL",
        "IDENTIFICADOR",
        "TELEFONO1",
        "TELEFONO2",
        "TELEFONO3",
        "TELEFONO4",
        "TELEFONO5",
        "CORREO1",
        "CORREO2",
        "CORREO3",
        "CORREO4",
        "CORREO5",
        "NOMBRE_COMPLETO",
        "LOGIN",
        "CLAVE",
        "ESTATUS"
    ];
    /* 
    Triggers on Table D_CONTACTOS:
    T_ID_D_CONTACTOS, Sequence: 0, Type: BEFORE INSERT, Active
    T_F_D_CONTACTOS, Sequence: 0, Type: BEFORE UPDATE, Active
    T_D_CONTACTOS_NOMBRE_COMP, Sequence: 10, Type: BEFORE INSERT OR UPDATE, Active 
    */
}
