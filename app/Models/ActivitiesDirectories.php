<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activitiesDirectories extends Model
{
    use HasFactory;

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
