<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MClientes extends Model
{
    use HasFactory;


    //use HasFactory, SoftDeletes;

    protected $table = 'M_CLIENTES';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        "ID_M_CLIENTES",
        "TIPO",
        "NOMBRES",
        "RAZON",
        "NACIONALIDAD",
        "CODIGO1",
        "CODIGO2",
        "DIRECCION",
        "TIPO_PRECIO",
        "CONTABLE1",
        "FECHA",
        "ACCION",
        "UNICO",
        "BARCODE",
        "TELEFONO1",
        "TELEFONO2",
        "TELEFONO3",
        "CORREO",
        "ID",
        "ID_EMPRESA",
        "TEMP",
        "FACTOR1",
        "FACTOR2",
        "FACTOR3",
        "FACTOR4",
        "DIAS_CREDITO",
        "CAMPO1",
        "CAMPO2",
        "CAMPO3",
        "CAMPO4",
        "CAMPO5",
        "FECHA_REGISTRO",
        "LIMITE_CREDITO",
        "ESTATUS",
        "CODIGO3",
        "ID_PADRE",
        "AUTORIZACION_SRI",
        "SERIE",
        "NOMBRE_SALON",
        "COMENTARIOS",
        "IDCLI",
        "SRI_TIPO",
        "CLARO_USUARIO",
        "CLARO_CUPO",
        "SRI_CONTABILIDAD",
        "PORCENTAJE_FACTURA",
        "LLAVE",
        "TELEGRAM_ID",
        //NO SE USA NO TIENE REGISTO
        "ID_M_PAISES",
        "ID_M_DISTRIBUIDORES",
        "ID_M_ESTADOS",
        "ID_M_MUNICIPIOS",
        "ID_M_DOC_FINAL",
        //NO SE USA NO TIENE REGISTO
        
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        "ID_M_TIPO_CLIENTES",
        "ID_M_ZONAS",
        "ID_M_VENDEDORES",

    ];

    /* 
    CONSTRAINT FK_M_CLIENTES_M_TIPO_CLIENTES:
    Foreign key (ID_M_TIPO_CLIENTES)    References M_TIPO_CLIENTES (ID_M_TIPO_CLIENTES)
    CONSTRAINT FK_M_CLIENTES_M_VENDEDORES:
    Foreign key (ID_M_VENDEDORES)    References M_VENDEDORES (ID_M_VENDEDORES)
    CONSTRAINT FK_M_CLIENTES_M_ZONAS:
    Foreign key (ID_M_ZONAS)    References M_ZONAS (ID_M_ZONAS)
    CONSTRAINT INTEG_241:
    Primary key (ID_M_CLIENTES)

    Triggers on Table M_CLIENTES:
    T_ID_M_CLIENTES, Sequence: 0, Type: BEFORE INSERT, Active
    T_F_M_CLIENTES, Sequence: 0, Type: BEFORE UPDATE, Active
    M_CLIENTES_CLI_SER, Sequence: 0, Type: AFTER DELETE, Inactive
    T_M_CLIENTES_D_TELEFONOS, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active
    M_CLIENTES_LLAVE, Sequence: 2, Type: BEFORE INSERT OR UPDATE, Active
 */
}
