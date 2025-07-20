<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class ActivitiesDirectoriesMongo extends Model
{

    
    protected $fillable = [
        'cod_actividad', 
        'sectores_echo', 
        'sectores_bha', 
        'indicadores_bha', 
        'indicadores_echo', 
        'sectores_aecid', 
        'indicadores_aecid',
        'type_asistence_kind_cash_services',
        'fase'
    ];
}
