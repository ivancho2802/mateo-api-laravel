<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class MLpaPersonaMongo extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'ID','DOCUMENTO', 'NOMBRE_PRIMERO', 'NOMBRE_OTROS', 'APELLIDO_PRIMERO', 'APELLIDO_OTRO', 'TELEFONO', 'GENERO'
    ];
}
