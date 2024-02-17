<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\MLpaEmergencia;
use App\Models\Activities;

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
        "STATUS"
    ];

    /**
     * SCOPES
     */
    public function scopeActive(Builder  $query):void {
        $query->orWhere([
            ['STATUS', true],
            ['STATUS', 1],
            ['STATUS', '1']
        ]);
    }

    
    public function emergencia()
    {
        return $this->hasOne(MLpaEmergencia::class, 'ID', 'FK_LPA_EMERGENCIA' );
    }

    
    public function actividad()
    {
        return $this->hasOne(Activities::class, 'cod', 'COD_ACTIVIDAD' );
    }

}
