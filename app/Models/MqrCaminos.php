<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MqrCaminos extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'fecha',
        'mes',
        'organizacion',
        'tipo_intervencion',
        'codigo',
        'departamento',
        'municipio',
        'comunidad',
        'ninas',
        'ninos',
        'mujeres',
        'hombres',
        'hallazgos_programaticos',
        'recomendaciones_programaticas',
        'primer_contacto_alegría',
        'primer_contacto_aburrimiento',
        'primer_contacto_tristeza',
        'primer_contacto_enojo',
        'primer_contacto_NS_NR',
        'presentacion_MIRE_alegría',
        'presentacion_MIRE_aburrimiento',
        'presentacion_MIRE',
        'enojo',
        'NS_NR',
        'alegría',
        'aburrimiento',
        'presentacion_MIRE_tristeza',
        'presentacion_MIRE_enojo',
        'presentacion_MIRE_NS_NR',
        'finalizacion_atencion_alegría',
        'finalizacion_atencion_aburrimiento',
        'finalizacion_atencion_tristeza',
        'finalizacion_atencion_enojo',
        'finalizacion_atencion_NS_NR'
    ];


}
