<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MLpa;

class Activities extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector', 'cod', 'actividad', 'ID_M_USUARIOS'
    ];

    /* public function lpa()
    {
        return $this->hasOne(MLpa::class, 'COD_ACTIVIDAD', 'fk_lpa' );
    } */
    public function indiceActividad(){
        $this->actividad;
    }
}
