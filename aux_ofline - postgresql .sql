select "DEPARTMENT"  from "M_MQR"   group by "DEPARTMENT"
select "SEXO"  from "M_MQR"   group by "SEXO"

select * from echo_activity;
select * from echos;

select * from bha_activity;
select * from bhas;


select * from migrate_customs where "table" like '%echos_%'

select * from activities

select * from "M_LPA_EMERGENCIAS"
insert into "M_LPAS" (
        "ID",
        "FK_LPA_EMERGENCIA",
        "FK_LPA_PERSONA",
        "DONANTE",
        "COD_ACTIVIDAD",
        "FECHA_ATENCION",
        "REPRESENTANTE",
        "DOC_REPRESENTANTE",
        "TIPO_TRANFERENCIA",
        "MODO_ENTREGA",
        "PROVEEDOR_FINANCIERO",
        "MONTO_MENSUAL",
        "ID_M_USUARIOS",
        "STATUS"
)
VALUES (
        1,
        'FK_LPA_EMERGENCIA',
        'FK_LPA_PERSONA',
        'DONANTE',
        'COD_ACTIVIDAD',
        'FECHA_ATENCION',
        'REPRESENTANTE',
        'DOC_REPRESENTANTE',
        'TIPO_TRANFERENCIA',
        'MODO_ENTREGA',
        'PROVEEDOR_FINANCIERO',
        'MONTO_MENSUAL',
        'ID_M_USUARIOS',
        'STATUS');