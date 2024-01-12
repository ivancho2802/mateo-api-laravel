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
        "COD_EMERGENCIA",
        "TIPO_EVENTO",
        "SOCIO",
        "DEPARTAMENTO",
        "MUNICIPIO",
        "LUGAR_ATENCION"
    ];
}
