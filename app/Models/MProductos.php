<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MProductos extends Model
{
    use HasFactory;


    protected $table = 'M_PRODUCTOS';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        "ID_M_PRODUCTOS",
        "DESCRIPCION",
        "DESCRIPCION1",
        "DESCRIPCION2",
        "DESCRIPCION3",
        "DESCRIPCION4",
        "DESCRIPCION5",
        "DESCRIPCION6",
        "DESCRIPCION7",
        "DESCRIPCION8",
        "DESCRIPCION9",
        "DESCRIPCION10",
        "TIPO",
        "PRECIO1",
        "PRECIO2",
        "PRECIO3",
        "PRECIO4",
        "PRECIO5",
        "PRECIO6",
        "COSTO",
        "COSTO_PROMEDIO",
        "CODIGO1",
        "CODIGO2",
        "CODIGO3",
        "CODIGO4",
        "MARGEN",
        "REGULADO",
        "OFERTA",
        "O_CANTIDAD",
        "O_DESDE",
        "O_HASTA",
        "O_DESCUENTO",
        "O_PRECIO",
        "FECHA",
        "ACCION",
        "UNICO",
        "DESCUENTO1",
        "DESCUENTO2",
        "DESCUENTO3",
        "DESCUENTO4",
        "DESCUENTO5",
        "DESCUENTO6",
        "CALCULO",
        "BARCODE",
        "CONDICION",
        "ESTATUS",
        "ID",
        "PRIORIDAD",
        "ID_EMPRESA",
        "PREPARACION",
        "FORMA_COMISION",
        "COMISION1",
        "COMISION2",
        "COMISION3",
        "COMISION4",
        "COMISION5",
        "COMISION6",
        "MONTO_COMISION1",
        "MONTO_COMISION2",
        "MONTO_COMISION3",
        "MONTO_COMISION4",
        "MONTO_COMISION5",
        "MONTO_COMISION6",
        "COSTO_PROMEDIO2",
        "CAMPO1",
        "CAMPO2",
        "CAMPO3",
        "CAMPO4",
        "CAMPO5",
        "TEMP1",
        "GRUPO",
        "FACTOR1",
        "FACTOR2",
        "FACTOR3",
        "FACTOR4",
        "MODALIDAD",
        "FECHA_REGISTRO",
        "FORMA",
        "TIEMPO",
        "COMISION",
        "SERIALIZAR",
        "DESCRIPCION_NUMERO",
        "CONDICION1",
        "CONDICION2",
        "CONDICION3",
        "CONVERSION",
        "CLASE",
        "FOTO",
        "CONDICION_TERCERO",
        "CONDICION_HISTORICO",
        "FORMULA",
        "UBICACION",
        "ANCHO",
        "ALTO",
        "LARGO",
        "PESO",
        "PESO_UNITARIO",
        "UNIDADES_CAJA",
        "BASE_COMISION",
        "ECOMMERCE_ID",
        "ECOMMERCE_ACCION",
        "ECOMMERCE_DESCRIPCION",
        "XECOMMERCE_DESCRIPCION",

        //RELACIONALES
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        "ID_M_GENERICOS",

        //FALTA EN REALIDAD SE USA
        "ID_M_IMPUESTOS",
        "ID_M_LINEAS",
        "ID_M_PRESENTACIONES",
        "ID_M_P_DESCRIPCION",
        "ID_M_SUBLINEAS",
        //RELACIONALES
        
        //NO SE USA
        "ID_M_MODELOS",
        "ID_M_CENTRO_COSTOS",
        "ID_M_ARANCELES",
        "ID_P_M_SERIALES",
        "ID_M_IMPUESTOS2",
        "ID_M_UNIDADES",
        "ID_M_GRUPOS_PROTOCOLOS",
        "ID_M_UTILIDADES",
        "ID_M_MARCAS",
        "ID_M_FABRICAS",
        

    ];

    /* 
        CONSTRAINT FK_M_PRODUCTOS_CENTRO_COSTO:
        Foreign key (ID_M_CENTRO_COSTOS)    References M_CENTRO_COSTOS (ID_M_CENTRO_COSTOS)
        CONSTRAINT FK_M_PRODUCTOS_IMPUESTO_COMPRA:
        Foreign key (ID_M_IMPUESTOS2)    References M_IMPUESTOS (ID_M_IMPUESTOS)
        CONSTRAINT FK_M_PRODUCTOS_M_ARANCEL:
        Foreign key (ID_M_ARANCELES)    References M_ARANCELES (ID_M_ARANCELES)
        CONSTRAINT FK_M_PRODUCTOS_M_GENERICOS:
        Foreign key (ID_M_GENERICOS)    References M_GENERICOS (ID_M_GENERICOS)
        CONSTRAINT FK_M_PRODUCTOS_M_IMPUESTOS:
        Foreign key (ID_M_IMPUESTOS)    References M_IMPUESTOS (ID_M_IMPUESTOS)
        CONSTRAINT FK_M_PRODUCTOS_M_LINEAS:
        Foreign key (ID_M_LINEAS)    References M_LINEAS (ID_M_LINEAS)
        CONSTRAINT FK_M_PRODUCTOS_M_MARCAS:
        Foreign key (ID_M_MARCAS)    References M_MARCAS (ID_M_MARCAS)
        CONSTRAINT FK_M_PRODUCTOS_M_MODELOS:
        Foreign key (ID_M_MODELOS)    References M_MODELOS (ID_M_MODELOS)
        CONSTRAINT FK_M_PRODUCTOS_M_PRESENTACIONES:
        Foreign key (ID_M_PRESENTACIONES)    References M_PRESENTACIONES (ID_M_PRESENTACIONES)
        CONSTRAINT FK_M_PRODUCTOS_M_P_DESCRIPCION:
        Foreign key (ID_M_P_DESCRIPCION)    References M_P_DESCRIPCION (ID_M_P_DESCRIPCION)
        CONSTRAINT FK_M_PRODUCTOS_M_UNIDADES:
        Foreign key (ID_M_UNIDADES)    References M_UNIDADES (ID_M_UNIDADES)
        CONSTRAINT FK_M_PRODUCTOS_M_UTILIDADES:
        Foreign key (ID_M_UTILIDADES)    References M_UTILIDADES (ID_M_UTILIDADES)
        CONSTRAINT FK_M_PRODUCTOS_P_M_SERI:
        Foreign key (ID_P_M_SERIALES)    References P_M_SERIALES (ID_P_M_SERIALES)
        CONSTRAINT FK_M_PRODUCTOS_SUB_LINEA:
        Foreign key (ID_M_SUBLINEAS)    References M_SUBLINEAS (ID_M_SUBLINEAS)
        CONSTRAINT INTEG_111:
        Primary key (ID_M_PRODUCTOS)
        CONSTRAINT UK_ID_M_PRODUCTOS:
        Unique key (ID, ID_EMPRESA)

        Triggers on Table M_PRODUCTOS:
        T_ID_M_PRODUCTOS, Sequence: 0, Type: BEFORE INSERT, Active
        M_PRODUCTOS_CODIGO_BARRAS, Sequence: 3, Type: BEFORE INSERT, Active
        T_ACTUALIZA_I_PROD_ALMA, Sequence: 0, Type: AFTER INSERT, Active
        T_M_PRODUCTOS_DETALLE, Sequence: 2, Type: AFTER INSERT, Active
        T_F_M_PRODUCTOS, Sequence: 0, Type: BEFORE UPDATE, Active
        T_M_PRODUCTOS_MOD, Sequence: 0, Type: BEFORE UPDATE, Active
        M_PRODUCTOS_COSTO, Sequence: 3, Type: BEFORE UPDATE, Active
        M_PRODUCTOS_ECOMMERCE, Sequence: 4, Type: BEFORE UPDATE, Active
        T_M_PRODUCTOS_ELI, Sequence: 2, Type: BEFORE DELETE, Inactive
        T_M_PRODUCTOS_CONTROL, Sequence: 3, Type: BEFORE DELETE, Inactive
        T_M_PRODUCTOS_INS, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active
        T_M_PRODUCTOS_PRECIO, Sequence: 2, Type: BEFORE INSERT OR UPDATE, Active
        T_ECOMMERCE_MAYUSCULA, Sequence: 4, Type: BEFORE INSERT OR UPDATE, Active
        T_M_PRODUCTOS_DES, Sequence: 10, Type: AFTER INSERT OR UPDATE, Active */
}
