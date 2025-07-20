<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MVendedores extends Model
{
    use HasFactory;

    protected $table = 'M_ZONAS';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        "ID_M_VENDEDORES",
        "NOMBRES",
        "APELLIDOS",
        "FECHA",
        "ACCION",
        "UNICO",
        "BARCODE",
        "ID",
        "ID_EMPRESA",
        "ESTATUS",
        "CAMPO1",
        "CAMPO2",
        "CAMPO3",
        "CAMPO4",
        "CAMPO5",
        "FECHA_REGISTRO",
        "COMISION_VENTA",
        "NOMBRE_COMPLETO",
        "P1",
        "P2",
        "P3",
        "P4",
        "P5",
        "P6",
        "C1",
        "C2",
        "C3",
        "C4",
        "C5",
        "C6",
        "FECHA_COMISION",
        "CONDICION1",
        "MONTO_COMISION",
        "TOTAL_BONO",
        "MONTO_BONO",
        "MONTO_CHARGEBACK",
        "TOTAL_COMISION",
        "CUOTA",
        "PENALIZACION",
        "CODIGO1",
        "CANTIDAD",
        "PORCENTAJE_IVA",
        "MONTO_IVA",
        "PORCENTAJE_FUENTE",
        "RETENCION_FUENTE",
        "RETENCION_IVA",
        "CALCULAR",
        "TOTAL_PAGAR",
        "TMP_CHARGEBACK",
        "MONTO_BONO_PAGOS",
        "MONTO_DESCUENTO",
        "MONTO_ANTICIPO",
        "NETO",
        "ID_PADRE",
        "NIVEL",
        "FECHA_INGRESO",
        "MEMBRESIA",
        "FOTO",
        "LLAVE",
        "CUPO",
        "CUPO_FACTURADO",
        "FORMA_FACTURA",
        "MONTO_CURACEL",
        "CONSTRAINT",
        
        //relacionales        
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        "ID_M_TIPO_VENDEDORES",
        "ID_M_USUARIO",
        //relacionales        
        
        //no tiene resgistros
        "ID_M_PROFESIONALES",
        "ID_M_TRABAJADORES",
        /* 
        Triggers on Table M_VENDEDORES:
        T_ID_M_VENDEDORES, Sequence: 0, Type: BEFORE INSERT, Active
        M_VENDEDORES_ARCHIVOS, Sequence: 0, Type: AFTER INSERT, Active
        T_F_M_VENDEDORES, Sequence: 0, Type: BEFORE UPDATE, Active
        M_VENDEDORES_AU1, Sequence: 0, Type: AFTER UPDATE, Active
        T_M_VENDEDORES_NOMBRE_COMPLETO, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active
        M_VENDEDORES_UID, Sequence: 4, Type: BEFORE INSERT OR UPDATE, Active */
    ];
}
