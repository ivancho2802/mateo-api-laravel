<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class MLpaEmergenciaMongo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "COD_EMERGENCIAS",
        "TIPO_EVENTO",
        "SOCIO",
        "DEPARTAMENTO",
        "MUNICIPIO",
        "LUGAR_ATENCION"
    ];
}
