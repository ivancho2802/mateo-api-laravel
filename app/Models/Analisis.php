<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analisis extends Model
{
    use HasFactory;

    protected $table = 'analisis';

    protected $fillable = [
        'texto',
        'month',
        'type',

        'peticiones',
        'quejas',
        'retroalimentaciones',
        'alertas',

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

    /* public function getMonthAttribute()
    {
        $month =  isset($this->month) ? $this->month . '-01' : $this->month;
        return $month;
    } */
}
