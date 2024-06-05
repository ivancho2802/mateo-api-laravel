<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analisis extends Model
{
    use HasFactory;

    protected $table = 'analisis';

    protected $fillable = [
        'texto', 'month', 'type','acceso',        'participacion',        'ajustes',        'respuesta_rapida',        'recuperacion_temprana',        'acompanamiento'
    ];

    /* public function getMonthAttribute()
    {
        $month =  isset($this->month) ? $this->month . '-01' : $this->month;
        return $month;
    } */
}
