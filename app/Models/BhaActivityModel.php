<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BhaActivityModel extends Model
{
    use HasFactory;
    protected $table = 'bha_activity';

    protected $fillable = [
        //taliz 
        'fk_bha', 'fk_activity', 'ID_M_USUARIOS'
    ];
}
