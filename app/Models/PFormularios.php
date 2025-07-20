<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MProductos;
use App\Models\MUsuarios;
use App\Models\MFormularios;

class PFormularios extends Model
{
    use HasFactory;


    protected $table = 'P_FORMULARIOS';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //relacionales
        "ID_P_FORMULARIOS",
        "ID_M_PRODUCTOS",
        "ID_M_FORMULARIOS",
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        //relacionales
        
        "ID",
        "ID_EMPRESA",
        "TABLA",
        "CAMPO",
        "ROTULO",
        "TIPO",
        "VALOR_REFERENCIA",
        "OPCIONES",
        "FECHA",
        "ACCION",
        "UNICO",
        "BARCODE",
        "UNIDAD",
        "POSICION",
        "ANCHO",
        "GRUPO",
        "SUBGRUPO",
        "CAMPO1",
        "CAMPO2",
        "CAMPO3",
        "CAMPO4",
        "CAMPO5",
        "FECHA_REGISTRO",
        "ESTATUS",
        "CODIGO1",
        "POSICION_GRUPO",
        "VALOR",
        "REFERENCIA",
        "XROTULO",
        "XGRUPO"
    ];

    /* 
    Triggers on Table P_FORMULARIOS:
    T_ID_P_FORMULARIOS, Sequence: 0, Type: BEFORE INSERT, Active
    T_F_P_FORMULARIOS, Sequence: 0, Type: BEFORE UPDATE, Active
    P_FORMULARIOS_ACENTOS, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active 
    */

    //"ID_M_PRODUCTOS",
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
    }

}
