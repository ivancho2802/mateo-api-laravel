<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MLpa;

class activities extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector', 'cod', 'actividad', 'fk_lpa'
    ];

    /* public function lpa()
    {
        return $this->hasOne(MLpa::class, 'COD_ACTIVIDAD', 'fk_lpa' );
    } */
}
