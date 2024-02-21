<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitDepartments;

class MMqr extends Model
{
    use HasFactory;
    use TraitDepartments;

    protected $table = 'M_MQR';

    public $incrementing = false;

    protected $primaryKey = "ID";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ID',
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
