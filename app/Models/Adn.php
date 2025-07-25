<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adn extends Model
{
    use HasFactory;

    protected $fillable = [
        'presupuesto_ach',
        'presupuesto_total',
        'otro',

        "dinero_ahorrado_x_persona",
        "grupo_ahorro",
        "personas_bancarizadas",

        "tasa_cambio",
        "feria_apoyo_emprendimiento2",
        "feria_apoyo_empleabilidad2",

        "feria_apoyo_emprendimiento2",
        "feria_apoyo_empleabilidad2",

        
        "total_ufa",// = 143520
        "total_nines"// = 12180
    ];
}
