<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDetails extends Model
{
    use HasFactory;


    protected $fillable = [
        "dominio",
        "name_key",
        "uui",
        "token",
        "otro"
    ];
}
