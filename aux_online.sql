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

-- cuantas personas
select COUNT("GENERO"), "GENERO" from "M_LPA_PERSONAS" GROUP BY "GENERO";

--	porcentaje de personas por genero
 select CAST((1/2) AS DECIMAL(10,2)) as INT;

select total from 
(
	SELECT
  	"GENERO",
  	COUNT("ETNIA") AS gen,
  	(SELECT COUNT(*) FROM "M_LPA_PERSONAS") AS total
	FROM "M_LPA_PERSONAS"
	GROUP BY "GENERO"
) as t


--personas por etnia

SELECT
  	"ETNIA",
  	COUNT("ETNIA") AS etnia
	FROM "M_LPA_PERSONAS"
	GROUP BY "ETNIA"
	

select count(*) from "M_LPAS" ;
--para saber cuantas respuestas a formularios de mpd se han realizado
-- ver cuantos formularios de mpd hay
select 
	*
from 
	 "M_KOBO_RESPUESTAS" 
where 
	 "M_KOBO_RESPUESTAS"."ID_M_KOBO_FORMULARIOS" is NULL
	and "M_KOBO_RESPUESTAS"."ID_M_KOBO_FORMULARIOS" = 985001
select 
count(*) 
from "M_KOBO_RESPUESTAS", "M_FORMULARIOS"
where "M_KOBO_RESPUESTAS"."ID_M_FORMULARIOS" = "M_FORMULARIOS"."ID_M_FORMULARIOS" and "M_FORMULARIOS"."ACCION" = 'MPD'
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

-- ver cuantos formularios de alertas hay
select 
count(*) 
from "M_KOBO_RESPUESTAS", "M_FORMULARIOS"
where "M_KOBO_RESPUESTAS"."ID_M_FORMULARIOS" = "M_FORMULARIOS"."ID_M_FORMULARIOS" and "M_FORMULARIOS"."ACCION" = 'ALERTA'
 group by "M_KOBO_RESPUESTAS"."_ID";

 -- query para revertir migracion de MPD
 DELETE FROM \"M_KOBO_RESPUESTAS\" WHERE \"ID\" in (SELECT \"ID\" FROM \"M_KOBO_RESPUESTAS\" WHERE \"_ID\" = '8916210' AND \"ID_M_FORMULARIOS\" = 'aQxrcJYzPy4nzzVRXZVSBC')

 DELETE FROM \"M_KOBO_FORMULARIOS\" WHERE id in (SELECT id FROM \"M_KOBO_FORMULARIOS\" WHERE \"_ID\" = '8916210' AND \"ID_M_FORMULARIOS\" = 'aQxrcJYzPy4nzzVRXZVSBC')


 -- QUERY PARA VALIDAR SI ESTA BIEN EL NUEMRO DE PREGUNTAS Y RESPUESTAS  PARA UN FORMULARIO

 
 SELECT count(*) FROM \"M_KOBO_RESPUESTAS\" WHERE \"_ID\" = '8916210' AND \"ID_M_FORMULARIOS\" = 'aQxrcJYzPy4nzzVRXZVSBC'
 SELECT count(*) FROM \"M_KOBO_FORMULARIOS\" WHERE \"_ID\" = '8916210' AND \"ID_M_FORMULARIOS\" = 'aQxrcJYzPy4nzzVRXZVSBC'