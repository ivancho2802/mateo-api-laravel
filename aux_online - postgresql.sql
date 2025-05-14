.
--CREATE USER harold WITH PASSWORD 'y@Z819_=9ra?'
SELECT count(*) FROM 
"M_LPAS", "M_LPA_EMERGENCIAS" 
where  
"M_LPAS"."FK_LPA_EMERGENCIA" = "M_LPA_EMERGENCIAS"."ID"
ORDER BY "FECHA_ATENCION" 
SELECT *
FROM 
public.migrate_customs 
where 
table_id != '[]' AND
"table" = 'M_LPAS'  AND 
file_ref = 'PENDING' 
and table_id not like '{%' 
order by updated_at desc limit 7 ;


SELECT *
FROM 
public.migrate_customs 
where 
--table_id != '[]' AND SELECT COUNT(*) FROM "M_LPAS"
"table" = 'M_LPAS'  AND 
file_ref like '%UPLOADED%' -- 16 + 144190 = 144206
--and table_id not like '{%' 
order by updated_at desc limit 7 ;--select count(*) from "M_LPAS"

SELECT *
FROM 
public.migrate_customs 
where 
--table_id != '[]' AND
"table" = 'M_LPAS'
  AND file_ref = 'PROCECED' 
--and table_id not like '{%' 
order by updated_at desc limit 7 ; 
SELECT * FROM "M_LPAS" LIMIT 1

SELECT *
FROM 
public.migrate_customs 
where 
table_id != '[]' AND
"table" = 'M_LPAS'  AND 
file_ref = 'PENDINGMONGO' 
and table_id not like '{%' 
order by updated_at desc limit 7 ;


select * from users where email like '%nrc%' limit 1
select * from "M_USUARIOS" where "LOGIN" = 'LSAENZ' limit 1

select COUNT(*) from "M_LPAS"     WHERE "FECHA_ATENCION" >= '2023-01-01'
--REPARAR CONSULTA PARA QUE NO DIGA LPA
SELECT "FK_LPA_PERSONA" FROM "M_LPAS" GROUP BY "FK_LPA_PERSONA"
select COUNT(DISTINCT "DOCUMENTO") from "M_LPA_PERSONAS" 
SELECT COUNT(*) FROM (SELECT DISTINCT "DOCUMENTO", "TIPO_DOCUMENTO" FROM "M_LPA_PERSONAS") AS temp; 
-- 
select "ID_M_USUARIOS" from "M_LPAS" LIMIT 10
select "DOCUMENTO", "TIPO_DOCUMENTO"  from "M_LPA_PERSONAS" order by "DOCUMENTO"

select * FROM "M_LPAS" where "FECHA_ATENCION" < '2000-02-01'
select * from migrate_customs where "table" = 'M_LPAS' and file_ref = 'UPLOADED' limit 10

select * from migrate_customs where "table" = 'M_LPAS' and table_id like '%migrationsLpa%'  order by updated_at desc limit 20
-- AJUSTES DE LPA	
select "FASE_ATENCION","FECHA_ATENCION", deleted_at from "M_LPAS" where "FASE_ATENCION" LIKE '%Fase III%' group by "FASE_ATENCION", deleted_at

-- matrices

select * from matrizs where origin like '%matriz_oleoductos2';
select * from matrizs order by id desc limit 10 ;

-- ver la ultima matriz el id

select id from matrizs  order by id desc;



-- tipos de respuestas para doiscapacidades de persoinas

select "DISCAPACIDAD_COMUNICAR" from "M_LPA_PERSONAS" GROUP BY "DISCAPACIDAD_COMUNICAR"

select "DISCAPACIDAD_VER", "ID" from "M_LPA_PERSONAS" where "DISCAPACIDAD_VER" = 'Si - No puede hacerlo' 

select *  from analisis

select "CHANNEL_IN" from "M_MQR" GROUP BY "CHANNEL_IN"
-- emergencias codigos
select "TIPO_EVENTO" FROM "M_LPA_EMERGENCIAS" GROUP BY "TIPO_EVENTO"
select * FROM "M_LPA_EMERGENCIAS" WHERE "ID" = 1643


select 
	*
FROM 
	"M_LPAS", "M_LPA_EMERGENCIAS" 
WHERE 
	"M_LPAS"."FK_LPA_EMERGENCIA" = "M_LPA_EMERGENCIAS"."ID" AND 
	"M_LPA_EMERGENCIAS"."ID" = "M_LPAS"."FK_LPA_EMERGENCIA" AND
	"M_LPAS"."FASE_ATENCION" = 'Fase III-RecuperaciÃ³n temprana' AND
	"M_LPA_EMERGENCIAS"."COD_EMERGENCIAS" LIKE '%PAPAYAL2%'
	
-- emergencias codigo

select "ORG_REPORT" from "M_MQR" GROUP BY "ORG_REPORT"

update analisis set texto = 'No hay datos' where texto is null;
update analisis set acceso = 'No hay datos' where acceso is null;
update analisis set participacion = 'No hay datos' where participacion is null;
update analisis set ajustes = 'No hay datos' where ajustes is null;
update analisis set respuesta_rapida = 'No hay datos' where respuesta_rapida is null;
update analisis set recuperacion_temprana = 'No hay datos' where recuperacion_temprana is null;
update analisis set acompanamiento = 'No hay datos' where acompanamiento is null;
select *  from analisis;

select  actividad, cod  from activities order by cod  where actividad like '%Ã¡%' group by actividad, cod;


select count(*) from "activities" where "activities"."cod" like '%NA%' in ('CF1', 'E2', 'E3', 'E5', 'E6', 'E7', 'F3', 'H2', 'H3', 'H4', 'H5', 'H6', 'H7', 'H8', 'P1', 'P2', 'P7', 'S2', 'S4', 'S5', 'W2', 'W3', 'W4', 'W6', 'W7')
SHOW server_encoding;
SET client_encoding = 'latin1'--SQL_ASCII
SHOW statement_timeout;
-- ver si es discapacitodo 14
SELECT count(*) 
FROM 
	"M_LPA_PERSONAS" 
where 
	"DISCAPACIDAD_COMUNICAR" = 'Si - No puede hacerlo' or
	"DISCAPACIDAD_VER" = 'Si - No puede hacerlo' or
	"DISCAPACIDAD_OIR" = 'Si - No puede hacerlo' or
	"DISCAPACIDAD_CAMINAR" = 'Si - No puede hacerlo' or 
	"DISCAPACIDAD_RECORDAR" = 'Si - No puede hacerlo' or
	"DISCAPACIDAD_CUIDADO_PROPIO" = 'Si - No puede hacerlo' or
	"DISCAPACIDAD_COMUNICAR" = 'Si - No puede hacerlo'
	
-- cuantas atenciones a discapacitados

select count(*) 
FROM "M_LPAS", "M_LPA_PERSONAS" 
WHERE "M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID" AND 
	"M_LPA_PERSONAS"."ID" = "M_LPAS"."FK_LPA_PERSONA" AND
(
	"M_LPA_PERSONAS"."DISCAPACIDAD_COMUNICAR" = 'Si - No puede hacerlo' or
	"M_LPA_PERSONAS"."DISCAPACIDAD_VER" = 'Si - No puede hacerlo' or
	"M_LPA_PERSONAS"."DISCAPACIDAD_OIR" = 'Si - No puede hacerlo' or
	"M_LPA_PERSONAS"."DISCAPACIDAD_CAMINAR" = 'Si - No puede hacerlo' or 
	"M_LPA_PERSONAS"."DISCAPACIDAD_RECORDAR" = 'Si - No puede hacerlo' or
	"M_LPA_PERSONAS"."DISCAPACIDAD_CUIDADO_PROPIO" = 'Si - No puede hacerlo' or
	"M_LPA_PERSONAS"."DISCAPACIDAD_COMUNICAR" = 'Si - No puede hacerlo' ) 
-- jobs
--ver rt
select count(*)
from "M_LPAS" --, "M_LPA_PERSONAS"
---select DISTINCT "M_LPAS"."FK_LPA_PERSONA" FROM "M_LPAS", "M_LPA_PERSONAS" 
WHERE 
	--"M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID" AND 
	--"M_LPA_PERSONAS"."ID" = "M_LPAS"."FK_LPA_PERSONA" and
	"M_LPAS"."FASE_ATENCION" = 'Fase III-RecuperaciÃ³n temprana' and 
	--"M_LPAS"."DONANTE" = 'COSUDE' and 
	"M_LPAS"."FECHA_ATENCION" >= '2024-11-01'
 GROUP BY "M_LPAS"."DONANTE"
-- ver rr
update "M_LPAS" set "FASE_ATENCION" = 'Fase I- Respuesta RÃ¡pida' where "FASE_ATENCION" = 'Fase I- Respuesta RÃ¡pida '

SELECT * FROM "M_LPA_PERSONAS" WHERE "DOCUMENTO" = '17675796'

select "M_LPAS"."ID" from 
	"M_LPAS", "M_LPA_EMERGENCIAS" 
where 
	"M_LPAS"."FK_LPA_EMERGENCIA" = "M_LPA_EMERGENCIAS"."ID" AND
	"M_LPA_EMERGENCIAS"."COD_EMERGENCIAS" = 'PULE-1047.1' AND
	"M_LPAS"."DONANTE" = 'AECID' AND 
	"M_LPAS"."COD_ACTIVIDAD" = 'W3' AND
	"M_LPAS"."FECHA_ATENCION" = '2024-11-10' AND 
	"M_LPAS"."FK_LPA_PERSONA" = 41928
	
select  COUNT(*) --"M_LPAS"."FASE_ATENCION"
from "M_LPAS" --, "M_LPA_PERSONAS"
WHERE 
	("M_LPAS"."FASE_ATENCION" = 'Fase I- Respuesta RÃ¡pida' OR
	"M_LPAS"."FASE_ATENCION" = 'Fase II- Respuesta RÃ¡pida') and 
	--"M_LPAS"."FECHA_ATENCION" >= '2024-10-26' and
	--"M_LPAS".created_at >= '2024-12-15' AND
	"M_LPAS"."ID" >= 802892
	
 GROUP BY "M_LPAS"."FASE_ATENCION"

-- ver fases de atencion si es rr o rt
select "M_LPAS"."FASE_ATENCION" from "M_LPAS" group by "M_LPAS"."FASE_ATENCION"

select "M_LPAS"."DONANTE" from "M_LPAS" group by "M_LPAS"."DONANTE"
select * from job_details
select count(*) from jobs
--delete from jobs
select COUNT(*) from failed_jobs
--delete from failed_jobs
--
--delete from job_details
--delete from jobs
--delete from failed_jobs
select 
	*  
from 
	"M_LPAS" 
order by 
	"M_LPAS"."ID" desc limit 329
	
SELECT * FROM "M_LPAS"  order by "ID" desc limit 10 
--insert into "M_LPAS" values(391420, NULL, NULL, 1223, 36537, 1, 'COSUDE', 'H9', '2024-06-25', '', '', '', '', '', '', 'Otro', 'Fase III-RecuperaciÃ³n temprana', NULL)

  from "M_LPAS" WHERE "ID" IN (select "ID"  from "M_LPAS" where "FASE_ATENCION" in ('Fase I- Respuesta RÃ¡pida ', 'Fase I- Respuesta RÃ¡pida', 'Fase II- Respuesta RÃ¡pida', 'Fase II- Respuesta RÃ¡pida ', '') )
--719 + 82675 + 328 = 83722

select "FECHA_ATENCION", "FASE_ATENCION"  from "M_LPAS" WHERE "FASE_ATENCION" LIKE '%III%' order by "FECHA_ATENCION" desc limit 10
--05-16-2024

-- tendria que ajustar para que no tome espacios de adelante y de atras

select count(*) from "M_MQR"
select * from analisis
select COUNT(*) from "M_LPAS"  where "COD_ACTIVIDAD" = 'H2' AND "FECHA_ATENCION" <='2024-03-31'
select * from activities where actividad like '%onsultas%'


-- reportes fichas de cierre y ern

select * from reports where codigo_emergencia = 'NAPO-1023.1'
update  reports set tipo_respuesta = 'Respuesta Rapida' -- 'Recuperacion Temprana'

select * from "M_LPA_PERSONAS" where "DOCUMENTO" = '1193041959'

select 
	"M_LPA_PERSONAS"."DOCUMENTO",
	"M_LPA_PERSONAS"."GENERO"
FROM 
	"M_LPAS", "M_LPA_PERSONAS" 
WHERE 
	"M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID" AND 
	"M_LPA_PERSONAS"."ID" = "M_LPAS"."FK_LPA_PERSONA" AND
	"M_LPAS"."FASE_ATENCION" = 'Fase III-RecuperaciÃ³n temprana'
	
SELECT "M_LPAS"."FASE_ATENCION" FROM  "M_LPAS" GROUP BY "M_LPAS"."FASE_ATENCION"	

select COUNT(*)
FROM "M_LPAS", "M_LPA_PERSONAS" 
WHERE "M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID" AND 
	"M_LPA_PERSONAS"."ID" = "M_LPAS"."FK_LPA_PERSONA" AND
(
	"M_LPA_PERSONAS"."DISCAPACIDAD_COMUNICAR" = 'Si - No puede hacerlo' or --Si - No puede hacerlo
	"M_LPA_PERSONAS"."DISCAPACIDAD_VER" = 'Si - No puede hacerlo' or--Si - No puede hacerlo
	"M_LPA_PERSONAS"."DISCAPACIDAD_OIR" = 'Si - No puede hacerlo' or--Si - No puede hacerlo
	"M_LPA_PERSONAS"."DISCAPACIDAD_CAMINAR" = 'Si - No puede hacerlo' or --Si - No puede hacerlo
	"M_LPA_PERSONAS"."DISCAPACIDAD_RECORDAR" = 'Si - No puede hacerlo' or--Si - No puede hacerlo
	"M_LPA_PERSONAS"."DISCAPACIDAD_CUIDADO_PROPIO" = 'Si - No puede hacerlo')--Si - No puede hacerlo

SELECT "DISCAPACIDAD_CUIDADO_PROPIO" FROM "M_LPA_PERSONAS" GROUP BY "DISCAPACIDAD_CUIDADO_PROPIO"


--para ver los discapactados reparados 
select * from "M_LPA_PERSONAS" limit 10  where "DOCUMENTO" = '21447907'
--445
select 
	count("M_LPA_PERSONAS"."DOCUMENTO") 
from 
	m_lpa_fixes, 
	"M_LPA_PERSONAS", 
	"M_LPAS" 
where 
	m_lpa_fixes.documento = "M_LPA_PERSONAS"."DOCUMENTO" and 
	"M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID" AND
	"M_LPA_PERSONAS"."ID" = "M_LPAS"."FK_LPA_PERSONA" 
GROUP BY "M_LPA_PERSONAS"."DOCUMENTO"


--update migrate_customs set "table" = 'M_LPAS_MONGO' where id in (select id from migrate_customs where file_ref = 'PENDINGMONGO' and "table" = 'M_LPAS')

select "table" from migrate_customs where file_ref = 'PENDINGMONGO' and "table" = 'M_LPAS_MONGO'
select count(*) from "M_LPAS" where 
--QUERY PARA BORRAR LPA POR RR
select 
	count(*)
from 
	"M_LPAS" 
WHERE
	"FASE_ATENCION"='Fase I- Respuesta RÃ¡pida' OR 
	"FASE_ATENCION"='Fase I- Respuesta RÃ¡pida ' OR
	"FASE_ATENCION"='Fase II- Respuesta RÃ¡pida' OR
	"FASE_ATENCION"='Fase II- Respuesta RÃ¡pida ' AND 
"FECHA_ATENCION" >= '2023-01-01'
 

SELECT fecha_ern, created_at FROM public.reports ORDER BY created_at desc 

select *
from 
	"M_MQR" order by "DATE_IN" desc limit 1 

SELECT created_at, month, * FROM public.analisis
ORDER BY month desc 

-- emergencias
select * from "M_LPA_EMERGENCIAS", "M_LPAS" WHERE "DEPARTAMENTO" = '' AND "M_LPAS"."FK_LPA_EMERGENCIA" = "M_LPA_EMERGENCIAS"."ID" 

select * from reports


select * from "M_MQR" WHERE "DATE_IN" > '2024-03-01' LIMIT 10 

select * from migrate_customs where "table"='M_MQR'  order by created_at desc limit 10

-- mqr caminos

select * from mqr_caminos