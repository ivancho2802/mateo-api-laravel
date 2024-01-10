<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MLpaPersona extends Model
{
    use HasFactory;

    protected $table = 'M_LPA_PERSONAS';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        "documento",
        "tipo_documento",
        "nombre_primero",
        "nombre_otros",
        "apellido_primero",
        "apellido_otros",
        "genero",
        "identidad_genero",
        "fecha_nacimiento",
        "nacionalidad",
        "perfil_migratorio",
        "situacion",
        "etnia",
        "perfil",
        "nivel_escolaridad",
        "caracteristica_madre",
        'discapacidad_ver',
        'discapacidad_oir',
        'discapacidad_caminar',
        'discapacidad_recordar',
        'discapacidad_cuidadopropio',
        'discapacidad_comunicar',
        "telefono"

    ];
}
