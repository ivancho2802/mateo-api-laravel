<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\MLpaEmergencia;
use App\Models\Activities;
use App\Models\MLpaPersona;
use App\Http\Controllers\helper;

class MLpa extends Model
{
    use HasFactory;

    protected $table = 'M_LPAS';

    public $timestamps = true;

    public $incrementing = false;
    protected $appends = ['tipo_lpa'];
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
        "FASE_ATENCION",
        "created_at"
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
    public function scopeNodeleted(Builder  $query): void
    {
        $query->whereNull('deleted_at');
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
        $fase = $this->FASE_ATENCION;
        /* $this->load(['actividad.directory']);
        //dd("actividad", $this->actividad->directory->fase);

        if(isset($this->FASE_ATENCION)){
        }else {
            if(!isset(optional($this->actividad->directory)->fase)){
                return 'Indefinido';
            }else{
                $fase = $this->actividad->directory->fase;
            }
        } */
        //dd("directory", $this->actividad->directory, $fase);

        $tipoLpa = 'Respuesta Rapida';

        if (
            strpos(strtoupper($fase), 'FASE 3')!==false || 
            strpos(strtoupper($fase), 'FASE III-')!==false || 
            strpos(strtoupper($fase), 'FASE III')!==false || 
            strpos($fase, "Fase III")!==false ||
            strtoupper($fase) == 'FASE 3') {
            $tipoLpa = 'Recuperacion Temprana';
        }

        return $tipoLpa;
    }


    public function emergencia()
    {
        return $this->hasOne(MLpaEmergencia::class, 'ID', 'FK_LPA_EMERGENCIA');
    }


    public function actividad()
    {
        //dd($this->hasOne(Activities::class, 'cod', 'COD_ACTIVIDAD'));

        return $this->hasOne(Activities::class, 'cod', 'COD_ACTIVIDAD');
    }

    public function persona()
    {
        return $this->hasOne(MLpaPersona::class, 'ID', 'FK_LPA_PERSONA');
    }
}
