<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DCorreos extends Model
{
    use HasFactory;

    protected $table = 'D_CORREOS';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "ID_D_CORREO",
        //relacionales
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        "ID_D_WHATSAPP",
        //relacionales
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
        "DESTINATARIO",
        "MENSAJE",
        "RESPUESTA",
        "FECHA_ENVIO",
        "IDX",
        "TABLA",
        "PUERTO1",
        "INTENTO",
        "FECHA2",
        "ESTATUS",
        "ASUNTO",
        "TIPO",
        "COMENTARIOS",
        "ARCHIVO",
        "REMITENTE",
        "CORREO_ID",
        "COMANDO",
        "EVENTO",
        "ORIGEN",
        "VARIABLES",
        "VARIABLES_JSON",
        "MAIL_HOST",
        "MAIL_PORT",
        "MAIL_USER",
        "MAIL_PASSWORD",
        "MAIL_FROM",
        "MAIL_CC",
        "NOMBRE",
        "HORA_ENVIO",
        "REVISADO_FECHA",
        "REVISADO_HORA",
        "REVISADO_CANTIDAD",
        "BEFORE_PREPARE",
        "AFTER_PREPARE"
    ];
}
