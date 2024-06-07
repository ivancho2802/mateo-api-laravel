<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitDepartments;

class MMqr extends Model
{
    use HasFactory;
    use TraitDepartments;

    protected $table = 'M_MQR';

    public $incrementing = false;

    protected $primaryKey = "ID";

    protected $appends = ['categorias_canales'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ID',
        'ORG_REPORT',
        'CONSECUTIVOS_CASES',
        'MONTH_REPORT',
        'DATE_IN',
        'CHANNEL_IN',
        'CATEGORY',
        'SUB_CATEGORY',
        'THEME',
        'ETNIA',
        'SEXO',
        'RANGE_EDAD',
        'DEPARTMENT',
        'MUNICICIO',
        'ADDRESS',
        'VALID',
        'RECIVE'
    ];



    /**
     * CHANNEL_IN buzon de sugerencias
        Categoría global	    Categoría específica
        Buzón de sugerencias 	Buzón de sugerencias
                                Buzón digital Kobo
        Correo electrónico	    Correo electrónico PQR
        Línea telefónica	    Línea telefónica / WhatsApp PQR
        Canal no formal	        WhatsApp no PQR
                                Remisión interna (staff)
        Remisión externa	    Remisión externa (socios)
                                Remisión externa (otros)
        PDM	                    PDM
        categorias_canales
     */
    public function getCategoriasCanalesAttribute()
    {
        $channel = strtoupper($this->CHANNEL_IN);

        $categoria = "Fallo al calcular";

        switch ($channel) {
            case strtoupper('BuzÃ³n de sugerencias'):
            case strtoupper('BuzÃ³n digital Kobo'):
            case strtoupper('Buzón de sugerencias'):
            case strtoupper('Buzón digital Kobo'):
                $categoria = 'Buzón de sugerencias';
                break;
                
            case strtoupper('Correo electrÃ³nico PQR'):
            case strtoupper('Correo electrónico PQR'):
                $categoria = 'Correo electrónico';
                break;

            case strtoupper('LÃ­nea telefÃ³nica/ whatsapp PQR'):
            case strtoupper('Línea telefónica / WhatsApp PQR'):
            case strtoupper('Línea telefónica/ whatsapp PQR'):
                $categoria = 'Línea telefónica';
                break;

            case strtoupper('Whatsapp no PQR'):
            case strtoupper('RemisiÃ³n interna staff'):
            case strtoupper('Remisión interna staff'):
            case strtoupper('Remisión interna (staff)'):
                $categoria = 'Canal no formal';
                break;

            case strtoupper('RemisiÃ³n externa (socios)'):
            case strtoupper('RemisiÃ³n externa (otros)'):
            case strtoupper('Remisión externa (socios)'):
            case strtoupper('Remisión externa (otros)'):
            case strtoupper('Remisión externa socios'):
            case strtoupper('Remisión externa otros'):
            case strtoupper('RemisiÃ³n externa socios'):
            case strtoupper('RemisiÃ³n externa otros'):
                $categoria = 'Remisión externa';
                break;
                
            case 'PDM':
                $categoria = 'PDM';
                break;

            default:
                $categoria = 'Fallo al calcular';
                break;
        }

        return $categoria;
    }
}
