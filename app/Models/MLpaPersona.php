<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\MLpa;
use Illuminate\Support\Arr;

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

    protected $appends = ['edad', 'disca_ver'];

    /**
     * calculo de la disca_ver apartie de la fecha de nacimiento
     */
    public function getDiscaVerAttribute()
    {
        $fecha_nac = $this->FECHA_NACIMIENTO;

        $discapacidades = [];

        if(isset($fecha_nac)){
            $howOldAmI = Carbon::createFromIsoFormat("YYYY-MM-DD", $fecha_nac)->age;  // 46 1999-08-30
        }

        return $howOldAmI;
    }
    
    public function getEdadAttribute()
    {
        $fecha_nac = $this->FECHA_NACIMIENTO;

        $howOldAmI = 0;

        if(isset($fecha_nac)){
            $howOldAmI = Carbon::createFromIsoFormat("YYYY-MM-DD", $fecha_nac)->age;  // 46 1999-08-30
        }

        return $howOldAmI;
    }
    
    public function emergencia()
    {
        return $this->hasOne(MLpaEmergencia::class, 'ID', 'FK_LPA_EMERGENCIA' );
    }
    
    public function atenciones()
    {
        return $this->hasMany(MLpa::class, 'FK_LPA_PERSONA', 'ID' );
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

        $atencionDoted = $atenciones->map(function ( $atencion) {
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
