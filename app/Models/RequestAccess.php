<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestAccess extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'organization',
        'email',
    ];
    

}
