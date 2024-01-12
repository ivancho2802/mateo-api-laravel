<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MLpa extends Model
{
    use HasFactory;
    
    

    protected $table = 'M_LPAS';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
        "MONTO_MENSUAL"
    ];
}
