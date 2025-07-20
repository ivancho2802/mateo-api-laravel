<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EchoActivityModel extends Model
{
    use HasFactory;

    protected $table = 'echo_activity';

    protected $fillable = [
        //taliz 
        'fk_echo', 'fk_activity', 'ID_M_USUARIOS'
    ];
    
}
