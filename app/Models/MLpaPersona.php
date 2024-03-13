<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class MLpaPersona extends Model
{
    use HasFactory;

    protected $table = 'M_LPA_PERSONAS';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'DOCUMENTO', 'NOMBRE_PRIMERO','NOMBRE_OTROS','APELLIDO_PRIMERO','APELLIDO_OTRO','TELEFONO'
    ];

    public $incrementing = false;

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

    //protected $appends = ['edad'];

    /**
     * calculo de la edad apartie de la fecha de nacimiento
     */
    public function getEdadAttribute()
    {
        $fecha_nac = $this->FECHA_NACIMIENTO;

        $howOldAmI = Carbon::createFromIsoFormat("YYYY-MM-DD", $fecha_nac)->age;  // 46 1999-08-30

        return $howOldAmI;
    }

}
