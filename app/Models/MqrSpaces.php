<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MqrSpaces extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_entry',
        'org_report',
        'type_act',
        'departamento',
        'municipio',
        'women',
        'men',
    ];

}
