<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EchoModel extends Model
{
    use HasFactory;

    protected $table = 'echos';

    protected $fillable = [
        //taliz 
        'cod', 'indicador', 'ID_M_USUARIOS'
    ];

    //subactividad
}
