<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MMqr extends Model
{
    use HasFactory;

    protected $table = 'M_M_MQR';

    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'ORG_REPORT',
        'CONSECUTIVOS_CASES',
        'MONTH_REPORT',
        'DATE_IN',
        'CHANNEL_IN',
        'CATEGORY',
        'SUB_CATEGORY',
        'THEME',
        'ETNIA',
        'SEXO',
        'RANGE_EDAD',
        'DEPARTMENT',
        'MUNICICIO',
        'ADDRESS',
        'VALID',
        'RECIVE'
    ];
}
