<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MUsuarios extends Model
{
    use HasFactory;


    protected $table = 'M_USUARIOS';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        "ID_M_USUARIO",
        "NOMBRES",
        "APELLIDOS",
        "LOGIN",
        "CLAVE",
        "FECHA",
        "ACCION",
        "UNICO",
        "ID",
        "ID_EMPRESA",
        "HUELLA",
        "SESSION_ID",
        "ESTATUS",
        "IP",
        "CAMPO1",
        "CAMPO2",
        "CAMPO3",
        "CAMPO4",
        "CAMPO5",
        "NIVEL",
        "ROTULO",
        "FECHA_REGISTRO",
        "CODIGO1",
        "CODIGO2",
        "CODIGO3",
        "NOMBRE_COMPLETO",
        "FRASE",
        "FORMULA",
        "FECHA_NAC",
        "CONDICION_SESION",
        "AGENTE_ESTATUS",
        "LLAVE",
        "NAVEGADOR",
        "CORREO",
        
        //relacionales
        "ID_M_NIVELES",
        "ID_M_VENDEDORES",
        "ID_M_CLIENTES",
        "ID_M_DEPARTAMENTOS",
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        //relacionales

        //NO EXISTE
        "ID_M_GRUPOS",

        /*
        "CONSTRAINT FK_ID_M_DEPARTAMENTOS:
        Foreign key (ID_M_DEPARTAMENTOS)    References M_DEPARTAMENTOS (ID_M_DEPARTAMENTOS)
        CONSTRAINT FK_M_USUARIOS1:
        Foreign key (ID_M_NIVELES)    References M_NIVELES (ID_M_NIVELES)
        CONSTRAINT FK_M_USUARIOS_GRUPOS:
        Foreign key (ID_M_GRUPOS)    References M_GRUPOS (ID_M_GRUPOS)
        CONSTRAINT FK_M_USUARIOS_M_CLEINTES:
        Foreign key (ID_M_CLIENTES)    References M_CLIENTES (ID_M_CLIENTES)
        CONSTRAINT PK_M_USUARIOS:
        Primary key (ID_M_USUARIO)
        CONSTRAINT UK_ID_M_USUARIOS:
        Unique key (ID, ID_EMPRESA)

        Triggers on Table M_USUARIOS:
        T_ID_M_USUARIOS, Sequence: 0, Type: BEFORE INSERT, Active
        T_F_M_USUARIOS, Sequence: 0, Type: BEFORE UPDATE, Active
        T_M_USUARIOS_SESSION, Sequence: 2, Type: BEFORE UPDATE, Active
        T_M_USUARIOS_CONTROL, Sequence: 0, Type: BEFORE DELETE, Inactive
        T_M_USUARIOS_NOMBRE, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active
        M_USUARIOS_LLAVE, Sequence: 2, Type: BEFORE INSERT OR UPDATE, Active
        M_USUARIOS_CORREO, Sequence: 3, Type: BEFORE INSERT OR UPDATE, Active
        */
    ];


    /* //"ID_M_PRODUCTOS",
    public function prod()
    {
        return $this->belongsTo(MProductos::class, "ID_M_PRODUCTOS");
    }

    //"ID_M_FORMULARIOS",
    public function form()
    {
        return $this->belongsTo(MFormularios::class, "ID_M_FORMULARIOS");
    }

    //"ID_M_USUARIOS",
    public function user()
    {
        return $this->belongsTo(MUsuarios::class, "ID_M_USUARIOS");
    }

    //"ID_M_AREAS",
    public function area()
    {
        return $this->belongsTo(MUsuarios::class, "ID_M_AREAS");
    } */
}
