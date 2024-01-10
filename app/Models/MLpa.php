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
        "fk_lpa_emergencia",
        "fk_lpa_persona",
        "donante",
        "cod_actividad",
        "fecha_atencion",
        "representante",
        "doc_representante",
        "tipo_tranferencia",
        "modo_entrega",
        "proveedor_financiero",
        "monto_mensual"
    ];
}
