<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\ActivitiesDirectoriesMongo;

class ActivitiesMongo extends Model
{
    
    protected $fillable = [
        'sector', 'cod', 'actividad', 'ID_M_USUARIOS'
    ];

    
    public function indiceActividad(){
        $this->actividad;
    }

    public function directory()
    {
        return $this->hasOne(ActivitiesDirectoriesMongo::class, 'cod_actividad', 'cod' );
    }
}
