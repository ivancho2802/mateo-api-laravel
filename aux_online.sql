.
SELECT *
FROM 
public.migrate_customs 
where 
table_id != '[]' AND
"table" = 'M_LPAS'  AND 
file_ref = 'PENDING' and table_id not like '{%' order by updated_at desc limit 7 ;

select * from users where email like '%nrc%' limit 1
select * from "M_USUARIOS" where "LOGIN" = 'LSAENZ' limit 1

select COUNT( "FK_LPA_PERSONA") from "M_LPAS"    
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

select "TIPO_EVENTO" FROM "M_LPA_EMERGENCIAS" GROUP BY "TIPO_EVENTO"

select "ORG_REPORT" from "M_MQR" GROUP BY "ORG_REPORT"

update analisis set texto = 'No hay datos' where texto is null;
update analisis set acceso = 'No hay datos' where acceso is null;
update analisis set participacion = 'No hay datos' where participacion is null;
update analisis set ajustes = 'No hay datos' where ajustes is null;
update analisis set respuesta_rapida = 'No hay datos' where respuesta_rapida is null;
update analisis set recuperacion_temprana = 'No hay datos' where recuperacion_temprana is null;
update analisis set acompanamiento = 'No hay datos' where acompanamiento is null;
select *  from analisis;

select  actividad, cod  from activities  where actividad like '%Ã¡%' group by actividad, cod;


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

select count(*) from job_details
select count(*) from jobs
select count(*) from failed_jobs
--
--delete from job_details
--delete from jobs
--delete from failed_jobs

