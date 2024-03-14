<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\MKoboRespuestas;
use App\Models\MKoboFormularios;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MFormulario extends Model
{
    use HasFactory;
    //use HasFactory, SoftDeletes;
    
    protected $table = 'M_FORMULARIOS';

    protected $primaryKey = 'ID_M_FORMULARIOS';

    public $incrementing = false;

    public $keyType = "string";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "ID",
        'ID_M_FORMULARIOS',

        "FECHA",
        "FECHA_REGISTRO",
        "ACCION",
        "UNICO",
        "BARCODE",
        "ID_EMPRESA",
        "CAMPO1",
        "CAMPO2",
        "CAMPO3",
        "CAMPO4",
        "CAMPO5",
        "ESTATUS",
        "NOMBRES",
        "VIA",
        "TIPO",
        "UID",
        "ASSET_UID",
        "URL_DATA",
        "URL_CAMPOS",
        "COMENTARIOS",
        "GRUPO",
        //relacionales
        "ID_M_CLIENTES",
        "ID_M_USUARIOS",
        "ID_M_AREAS",
    ];
    
    public function respuestas(): HasMany{
        return $this->hasMany(MKoboRespuestas::class, "ID_M_FORMULARIOS");
    }

    public function preguntas(): HasMany{
        return $this->hasMany(MKoboFormularios::class, "ID_M_FORMULARIOS");
    }

    /* 
    @Column
    ID_M_FORMULARIOS: string;

    @Column
    ID_M_USUARIOS: string;


    @Column
    ID_M_AREAS: string;


    @Column
    FECHA: Date;


    @Column
    FECHA_REGISTRO: Date;


    @Column
    ACCION: string;


    @Column
    UNICO: string;


    @Column
    BARCODE: string;


    @Column
    ID: number;


    @Column
    ID_EMPRESA: number;


    @Column
    CAMPO1: string;


    @Column
    CAMPO2: string;


    @Column
    CAMPO3: string;


    @Column
    CAMPO4: string;


    @Column
    CAMPO5: string;


    @Column
    ESTATUS: string;


    @Column
    NOMBRES: string;


    @Column
    VIA: string;


    @Column
    TIPO: string;


    @Column
    ID_M_CLIENTES: string;


    @Column
    UID: string;


    @Column
    URL_DATA: string;


    @Column
    URL_CAMPOS: string;


    @Column
    COMENTARIOS: string;


    @Column
    GRUPO: string; */
}