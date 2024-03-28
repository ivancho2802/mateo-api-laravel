select "DEPARTMENT"  from "M_MQR"   group by "DEPARTMENT"
select "SEXO"  from "M_MQR"   group by "SEXO"
select * from activities where cod='CS2'
select * from migrate_customs where "table" like '%echos_%'

--PARA LA VALIDACION DE PROESOS PENDIENTE PÓR MES
SELECT count(*) 
FROM 
public.migrate_customs 
where 
table_id != '[]' AND
"table" = 'M_LPAS'  AND 
file_ref = 'PENDING'

select * from "M_LPAS" ;
--para saber cuantas respuestas a formularios de mpd se han realizado
select count(*) from "M_KOBO_RESPUESTAS" group by "_ID";
--esto es solo para ver las preguntas guardadas
select count(*) from "M_KOBO_FORMULARIOS"

--PARA LA VALIDACION DE PROESOS PENDIENTE  
SELECT count(*) 
FROM 
public.migrate_customs 
where 
table_id != '[]' AND
"table" = 'MPD'  AND 
file_ref = 'UPLOADED'