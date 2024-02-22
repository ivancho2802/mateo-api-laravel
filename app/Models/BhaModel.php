<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BhaModel extends Model
{
    use HasFactory;

    protected $table = 'bhas';

    protected $fillable = [
        //Indicador BHA No. ^ 
        'cod', 'indicador', 'ID_M_USUARIOS'
    ];

    //subactividad
}
