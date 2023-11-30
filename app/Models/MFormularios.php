<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class MFormularios extends Model
{
    use HasFactory;
    //use HasFactory, SoftDeletes;
    
    protected $table = 'M_FORMULARIOS';

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ID_M_FORMULARIOS', 'email', 'password',
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        "FECHA",
        "FECHA_REGISTRO",
        "ACCION",
        "UNICO",
        "BARCODE",
        "ID",
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
        "ID_M_CLIENTES",
        "UID",
        "URL_DATA",
        "URL_CAMPOS",
        "COMENTARIOS",
        "GRUPO"
    ];
    

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