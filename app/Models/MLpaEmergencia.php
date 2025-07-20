<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MLpa;

class MLpaEmergencia extends Model
{
    use HasFactory;
    

    protected $table = 'M_LPA_EMERGENCIAS';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "COD_EMERGENCIAS",
        "TIPO_EVENTO",
        "SOCIO",
        "DEPARTAMENTO",
        "MUNICIPIO",
        "LUGAR_ATENCION"
    ];

    
    public function atenciones()
    {
        return $this->hasMany(MLpa::class, 'FK_LPA_EMERGENCIA', 'ID');
    }
}
