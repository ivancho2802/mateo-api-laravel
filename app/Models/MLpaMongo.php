<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
//use MongoDB\Laravel\Eloquent\Model;

//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\DocumentModel;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\ActivitiesMongo;
use App\Models\MLpaPersonaMongo;


class MLpaMongo extends Model
{
    protected $fillable = [

        "ID_M_KOBO_FORMULARIOS",
        "_ID", //relacionado al id de la respuesta del usuario

        "FECHA",
        "FECHA_REGISTRO",
        "ACCION",
        "UNICO",
        "BARCODE",
        "id",
        "ID",
        "ID_EMPRESA",
        "CAMPO1",
        "CAMPO2",
        "CAMPO3",
        "CAMPO4",
        "CAMPO5",
        "ESTATUS",
        "FECHA_FORMULARIO",
        "UID",
        "FUID",
        "CORREO_TEST",
        "FECHA_ESTADISTICA",
        "DEPARTAMENTO",
        "REGION",
        "CORREO",
        "FUNICO",
        "MUNICIPIO",
        "CODIGO_ALERTA",
        "XCODIGO_ALERTA",
        "PREFIJO_ALERTA",

        //RELACIONALES
        "ID_M_LOCALIDADES",
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        "ID_M_FORMULARIOS",
        //RELACIONALES

    ];
    public $timestamps = true;

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
        $this->load(['actividad.directory']);
        //dd("actividad", $this->actividad->directory->fase);

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
        return $this->hasOne(MLpaEmergenciaMongo::class, 'ID', 'FK_LPA_EMERGENCIA');
    }


    public function actividad()
    {
        //dd($this->hasOne(Activities::class, 'cod', 'COD_ACTIVIDAD'));

        return $this->hasOne(ActivitiesMongo::class, 'cod', 'COD_ACTIVIDAD');
    }

    public function persona()
    {
        return $this->hasOne(MLpaPersonaMongo::class, '_id', 'FK_LPA_PERSONA');
    }
}
