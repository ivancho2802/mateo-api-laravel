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

select COUNT(DISTINCT "FK_LPA_PERSONA") from "M_LPAS"   
--REPARAR CONSULTA PARA QUE NO DIGA LPA
SELECT "FK_LPA_PERSONA" FROM "M_LPAS" GROUP BY "FK_LPA_PERSONA"
select COUNT(DISTINCT "DOCUMENTO") from "M_LPA_PERSONAS" 
SELECT COUNT(*) FROM (SELECT DISTINCT "DOCUMENTO", "TIPO_DOCUMENTO" FROM "M_LPA_PERSONAS") AS temp; 
-- 
select "ID_M_USUARIOS" from "M_LPAS" LIMIT 10
select "DOCUMENTO", "TIPO_DOCUMENTO"  from "M_LPA_PERSONAS" order by "DOCUMENTO"

select * FROM "M_LPAS" where "FECHA_ATENCION" >= '2024-02-01'
select * from migrate_customs where "table" = 'M_LPAS' and file_ref = 'UPLOADED' limit 10

select * from migrate_customs where "table" = 'M_LPAS' and table_id like '%migrationsLpa%'  order by updated_at desc limit 20