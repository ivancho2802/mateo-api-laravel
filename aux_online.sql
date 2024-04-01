--ver los departamentos que en mqr
select "DEPARTMENT"  from "M_MQR"   group by "DEPARTMENT"


--ver los generos que hay en mqr
select "SEXO"  from "M_MQR"   group by "SEXO"

--ver las actividades que hay con el codigo "CS2" los codigos posibles estan en una tabla en nohunger 
--en 6. gestion interna / 3 . desarrollo ... / meal
select * from activities where cod='CS2';

-- es para ver los procesos de migracion de tablas 
--en 6. gestion interna / 3 . desarrollo ... / meal
select * from migrate_customs where "table" like '%echos_%'

--PARA LA VALIDACION DE PROESOS PENDIENTE PÓR MES
SELECT count(*) 
FROM 
public.migrate_customs 
where 
table_id != '[]' AND
"table" = 'M_LPAS'  AND 
file_ref = 'PENDING'

-- para saber cuantas atenciones hay en ssitema 
select count(*) from "M_LPAS" ;

-- para saber cuantas personas hay atrendidas
select count(*) from "M_LPAS" group by "FK_PERSONAS";

--para saber cuantas respuestas a formularios de mpd se han realizado
-- ver cuantos formularios de mpd hay
select 
count(*) 
from "M_KOBO_RESPUESTAS", "M_FORMULARIOS"
where "M_KOBO_RESPUESTAS"."ID_M_FORMULARIOS" = "M_FORMULARIOS"."ID_M_FORMULARIOS" and "M_FORMULARIOS"."ACCION" = 'M_LPAS'
 group by "M_KOBO_RESPUESTAS"."_ID";

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

-- ver cuantos formularios de mpd hay
select 
count(*) 
from "M_KOBO_RESPUESTAS", "M_FORMULARIOS"
where "M_KOBO_RESPUESTAS"."ID_M_FORMULARIOS" = "M_FORMULARIOS"."ID_M_FORMULARIOS" and "M_FORMULARIOS"."ACCION" = 'MPD'
 group by "M_KOBO_RESPUESTAS"."_ID";