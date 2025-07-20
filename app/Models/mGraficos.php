<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mGraficos extends Model
{
    use HasFactory;

    protected $table = 'V_M_GRAFICOS';

    protected $fillable = [
        "FECHA",
       "FECHA_REGISTRO",
       "ID",
       "FECHA_DESDE",
       "FECHA_HASTA",
       "ID_M_GRAFICOS",
       "ID_M_USUARIOS",
       "DESCRIPCION",
       "TITULO",
       "TITULOX",
       "TITULOY",
       "QUERY",
       "XQUERY",
       "FORMULARIO",
       "FORMA",
       "TIPO",
       "SERIE1",
       "SERIE2",
       "SERIE3",
       "SERIE4",
       "SERIE5",
       "ESTATUS",
       "CONDICION1",
       "COMENTARIOS",
       "CLASE",
       "ORDEN",
       "NOMBRE_ESTATUS",
       "NOMBRE_USUARIO",
       "REGISTROS"
    ];
}
