<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'codigo_emergencia',
        'departamento',
        'municipio',
        'tipo_emergencia',
        'fecha_ern',
        'links',
        'ID_M_USUARIOS',

        'tipo_respuesta',
        'tipo_producto',

    ];
    

}
