<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MLpaPersona extends Model
{
    use HasFactory;

    protected $table = 'M_LPA_PERSONAS';

    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        "DOCUMENTO",
        "TIPO_DOCUMENTO",
        "NOMBRE_PRIMERO",
        "NOMBRE_OTROS",
        "APELLIDO_PRIMERO",
        "APELLIDO_OTRO",
        "GENERO",
        "IDENTIDAD_GENERO",
        "FECHA_NACIMIENTO",
        "NACIONALIDAD",
        "PERFIL_MIGRATORIO",
        "SITUACION",
        "ETNIA",
        "PERFIL",
        "NIVEL_ESCOLARIDAD",
        "CARACTERISTICAS_MADRE",
        'DISCAPACIDAD_VER',
        'DISCAPACIDAD_OIR',
        'DISCAPACIDAD_CAMINAR',
        'DISCAPACIDAD_RECORDAR',
        'DISCAPACIDAD_CUIDADO_PROPIO',
        'DISCAPACIDAD_COMUNICAR',
        "TELEFONO"

    ];
}
