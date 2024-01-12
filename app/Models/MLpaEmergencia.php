<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MLpaEmergencia extends Model
{
    use HasFactory;
    

    protected $table = 'M_LPA_EMERGENCIAS';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "cod_emergencia",
        "tipo_evento",
        "socio",
        "departamento",
        "MUNICIPIO",
        "LUGAR_ATENCION"
    ];
}
