select "DEPARTMENT"  from "M_MQR"   group by "DEPARTMENT"
select "SEXO"  from "M_MQR"   group by "SEXO"
select * from activities where cod='CS2'
select * from migrate_customs where "table" like '%echos_%'

--PARA LA VALIDACION DE PROESOS PENDIENTE PÓR MES
SELECT * 
FROM 
public.migrate_customs 
where 
"table" = 'M_LPAS' 
AND file_ref = 'PENDING'

select * from "M_LPAS" ;
