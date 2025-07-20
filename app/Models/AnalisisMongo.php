<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class AnalisisMongo extends Model
{

    protected $fillable = [
        'texto',
        'month',
        'type',
        'respuesta_rapida',
        //////////////////////////////
        'acceso',
        'participacion',
        'ajustes',
        'acompanamiento',
        //////////////////////////////
        'recuperacion_temprana',
        'acompanamiento_rt',
        'acceso_rt',
        'participacion_rt',
        'ajustes_rt',
    ];
}
