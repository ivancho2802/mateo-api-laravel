<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\MLpaEmergencia;
use App\Models\Activities;
use App\Models\MLpaPersona;

class MLpa extends Model
{
    use HasFactory;

    protected $table = 'M_LPAS';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "ID",
        "FK_LPA_EMERGENCIA",
        "FK_LPA_PERSONA",
        "DONANTE",
        "COD_ACTIVIDAD",
        "FECHA_ATENCION",
        "REPRESENTANTE",
        "DOC_REPRESENTANTE",
        "TIPO_TRANFERENCIA",
        "MODO_ENTREGA",
        "PROVEEDOR_FINANCIERO",
        "MONTO_MENSUAL",
        "ID_M_USUARIOS",
        "STATUS",
        "FASE_ATENCION"
    ];

    /**
     * SCOPES
     */
    public function scopeActive(Builder  $query): void
    {
        $query->orWhere([
            ['STATUS', true],
            ['STATUS', 1],
            ['STATUS', '1']
        ]);
    }

    /**
     * tipo_lpa
     */
    public function getTipoLpaAttribute()
    {
        //fase 'FASE 1' || 'FASE 2'
        //respuesta rapida fase 1, fase 2
        //recuperacion temprana fase 3, 4, 5
        $fase = '';

        if(isset($this->FASE_ATENCION)){
            $fase = $this->FASE_ATENCION;
        }else {
            if(!isset(optional($this->actividad->directory)->fase)){
                return 'Indefinido';
            }else{
                $fase = $this->actividad->directory->fase;
            }
        }
        //dd("directory", $this->actividad->directory, $fase);

        $tipoLpa = 'Recuperacion Temprana';

        if ($fase == 'FASE 1' || $fase == 'FASE 2') {
            $tipoLpa = 'Respuesta Rapida';
        }

        return $tipoLpa;
    }


    public function emergencia()
    {
        return $this->hasOne(MLpaEmergencia::class, 'ID', 'FK_LPA_EMERGENCIA');
    }


    public function actividad()
    {
        return $this->hasOne(Activities::class, 'cod', 'COD_ACTIVIDAD');
    }

    public function persona()
    {
        return $this->hasOne(MLpaPersona::class, 'ID', 'FK_LPA_PERSONA');
    }
}
