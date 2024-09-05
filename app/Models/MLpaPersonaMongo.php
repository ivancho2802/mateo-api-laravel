<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class MLpaPersonaMongo extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'ID','DOCUMENTO', 'NOMBRE_PRIMERO', 'NOMBRE_OTROS', 'APELLIDO_PRIMERO', 'APELLIDO_OTRO', 'TELEFONO', 'GENERO'
    ];
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

    protected $appends = ['edad', 'discapacidades', 'discapacitado'];

    
    /**
     * calculo de la discapacidades  
     */
    public function getDiscapacidadesAttribute()
    {
        $discapa_ver = 0;
        $discapa_oir = 0;
        $discapa_caminar = 0;
        $discapa_recordar = 0;
        $discapa_cuidado = 0;
        $discapa_comunicar = 0;

        switch ($this->DISCAPACIDAD_VER) {
            case 'Si - No puede hacerlo':
                # code...
                $discapa_ver = 1;
                break;

            case 'Si - Alguna dificultad':
                # code...
                $discapa_ver = 0;
                break;

            case 'No - Sin dificultad':
                # code...
                $discapa_ver = 0;
                break;

            case 'Sin informaciÃ³n':
                # code...
                $discapa_ver = 0;
                break;

            case 'Si - Mucha dificultad':
                # code...
                $discapa_ver = 0;
                break;

            default:
                # code...
                $discapa_ver = 0;
                break;
        }


        switch ($this->DISCAPACIDAD_OIR) {
            case 'Si - No puede hacerlo':
                # code...
                $discapa_oir = 1;
                break;

            case 'Si - Alguna dificultad':
                # code...
                $discapa_oir = 0;
                break;

            case 'No - Sin dificultad':
                # code...
                $discapa_oir = 0;
                break;

            case 'Sin informaciÃ³n':
                # code...
                $discapa_oir = 0;
                break;

            case 'Si - Mucha dificultad':
                # code...
                $discapa_oir = 0;
                break;

            default:
                # code...
                $discapa_oir = 0;
                break;
        }


        switch ($this->DISCAPACIDAD_CAMINAR) {
            case 'Si - No puede hacerlo':
                # code...
                $discapa_caminar = 1;
                break;

            case 'Si - Alguna dificultad':
                # code...
                $discapa_caminar = 0;
                break;

            case 'No - Sin dificultad':
                # code...
                $discapa_caminar = 0;
                break;

            case 'Sin informaciÃ³n':
                # code...
                $discapa_caminar = 0;
                break;

            case 'Si - Mucha dificultad':
                # code...
                $discapa_caminar = 0;
                break;

            default:
                # code...
                $discapa_caminar = 0;
                break;
        }


        switch ($this->DISCAPACIDAD_RECORDAR) {
            case 'Si - No puede hacerlo':
                # code...
                $discapa_recordar = 1;
                break;

            case 'Si - Alguna dificultad':
                # code...
                $discapa_recordar = 0;
                break;

            case 'No - Sin dificultad':
                # code...
                $discapa_recordar = 0;
                break;

            case 'Sin informaciÃ³n':
                # code...
                $discapa_recordar = 0;
                break;

            case 'Si - Mucha dificultad':
                # code...
                $discapa_recordar = 0;
                break;

            default:
                # code...
                $discapa_recordar = 0;
                break;
        }


        switch ($this->DISCAPACIDAD_CUIDADO_PROPIO) {
            case 'Si - No puede hacerlo':
                # code...
                $discapa_cuidado = 1;
                break;

            case 'Si - Alguna dificultad':
                # code...
                $discapa_cuidado = 0;
                break;

            case 'No - Sin dificultad':
                # code...
                $discapa_cuidado = 0;
                break;

            case 'Sin informaciÃ³n':
                # code...
                $discapa_cuidado = 0;
                break;

            case 'Si - Mucha dificultad':
                # code...
                $discapa_cuidado = 0;
                break;

            default:
                # code...
                $discapa_cuidado = 0;
                break;
        }


        switch ($this->DISCAPACIDAD_COMUNICAR) {
            case 'Si - No puede hacerlo':
                # code...
                $discapa_comunicar = 1;
                break;

            case 'Si - Alguna dificultad':
                # code...
                $discapa_comunicar = 0;
                break;

            case 'No - Sin dificultad':
                # code...
                $discapa_comunicar = 0;
                break;

            case 'Sin informaciÃ³n':
                # code...
                $discapa_comunicar = 0;
                break;

            case 'Si - Mucha dificultad':
                # code...
                $discapa_comunicar = 0;
                break;

            default:
                # code...
                $discapa_comunicar = 0;
                break;
        }

        $discapacidades = [
            "ver" => $discapa_ver,
            "oir" => $discapa_oir,
            "caminar" => $discapa_caminar,
            "recordar" => $discapa_recordar,
            "cuidado" => $discapa_cuidado,
            "comunicar" => $discapa_comunicar,
        ];

        return $discapacidades;
    }


    /**
     * calculo de la discapacitado apartie de la fecha de nacimiento
     * cambio desspues de juLio es con la logica que tengo ahora
     * Y ANTES DE JULIO CON UNA TABLA
     */
    public function getDiscapacitadoAttribute()
    {
        $discapacitado = 0;

        $this->append('discapacidades');

        $this->discapacidades;

        /* [
            "ver" => $discapa_ver,
            "oir" => $discapa_oir,
            "caminar" => $discapa_caminar,
            "recordar" => $discapa_recordar,
            "cuidado" => $discapa_cuidado,
            "comunicar" => $discapa_comunicar,
        ] */

        $discapacidades = collect($this->discapacidades);

        $discapacitado = $discapacidades->filter(function ($value, $key) {
            return $value == 1;
        });

        //dd($this, $this->tipo_lpa);

        /* if(isset($this->tipo_lpa) && $this->tipo_lpa!=='Respuesta Rapida' )
        {
            return 0;
        } */

        return count($discapacitado) > 0 ? 1 : 0;
    }

    public function getEdadAttribute()
    {
        $fecha_nac = $this->FECHA_NACIMIENTO;//"2002-11-21 00:00:00.000000"
        $howOldAmI = 0;
        if(!isset($fecha_nac)){
            return $howOldAmI;
        }

        if(strpos($fecha_nac, "00:00:00")>=0){
            $arrayfecha_nac = explode(" ", $fecha_nac);
            $fecha_nac = $arrayfecha_nac[0];
        }
        

        $fecha_nac_isvalid = Carbon::createFromIsoFormat("YYYY-MM-DD", $fecha_nac);

        if ($fecha_nac_isvalid!==false && isset($fecha_nac)) {
            $howOldAmI = Carbon::createFromIsoFormat("YYYY-MM-DD", $fecha_nac)->age;  // 46 1999-08-30
        }

        return $howOldAmI;
    }
}
