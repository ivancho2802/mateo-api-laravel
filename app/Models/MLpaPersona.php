<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\MLpa;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

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
        'DOCUMENTO', 'NOMBRE_PRIMERO', 'NOMBRE_OTROS', 'APELLIDO_PRIMERO', 'APELLIDO_OTRO', 'TELEFONO'
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

    public static function isValidDate(string $dateString, string $format = 'Y-m-d'): bool
    {
        $dateTime = Carbon::createFromFormat($format, $dateString);

        return $dateTime && $dateTime->format($format) === $dateString;
    }

    public function emergencia()
    {
        return $this->hasOne(MLpaEmergencia::class, 'ID', 'FK_LPA_EMERGENCIA');
    }

    public function atenciones()
    {
        return $this->hasMany(MLpa::class, 'FK_LPA_PERSONA', 'ID');
    }

    /**
     * calculo de la edad apartie de la fecha de nacimiento
     */
    public function getCantAtencionesAttribute()
    {
        return count($this->atenciones);
    }

    /**
     * calculo de la edad apartie de la fecha de nacimiento cant_atenciones_by_departamento
     */
    public function getCantAtencionesByDepartamentoAttribute()
    {

        $atenciones = $this->atenciones;

        $atencionDoted = $atenciones->map(function ($atencion) {
            $atencion->load(['emergencia', 'actividad']);
            $atencion->append('cant_atenciones');
            $atencionDoted = Arr::dot($atencion);
            return $atencionDoted;
        });

        $grouped = $atencionDoted->countBy('emergencia.DEPARTAMENTO');

        /* ->atenciones->map(function ( $atencion) {
            $atencion->load(['emergencia', 'actividad']);
            $atencion->append('cant_atenciones');
            $atencionDoted = Arr::dot($atencion); 
            return $atencionDoted;
        }); */


        return $atencionDoted;
    }
}
