insert into "M_LPA_EMERGENCIAS" ("cod_emergencia", "tipo_evento", "socio", "departamento", "municipio", "lugar_atencion", "updated_at", "created_at") values (Codigo de la emergencia, tipode , socio, departamento, municipio, lufgar, 2024-01-11 15:32:25, 2024-01-11 15:32:25);

ALTER TABLE M_LPA_EMERGENCIAS ALTER COLUMN id SET nextval('item_number_pk')

insert into "M_LPA_EMERGENCIAS" ("cod_emergencia", "tipo_evento", "socio", "departamento", "municipio", "lugar_atencion", "updated_at", "created_at") values (Codigo de la emergencia, tipode , socio, departamento, municipio, lufgar, 2024-01-11 15:32:25, 2024-01-11 15:32:25)

connect "/opt/lampp/firebird/db/ach.gdb" user 'SYSDBA' password 'masterkey';

CREATE GENERATOR gen_t1_id;
SET GENERATOR gen_t1_id TO 0;


set term !! ;
CREATE TRIGGER T1_BI FOR M_LPA_EMERGENCIAS
ACTIVE BEFORE INSERT POSITION 0
AS
BEGIN
if (new.id is NULL) then new.id = GEN_ID(GEN_T1_ID, 1);
END!!
set term ; !!


set term !! ;
create trigger T1_BI
  active before insert or update position 0
  on M_LPA_EMERGENCIAS
as
begin
  if (new.'id' is null)
    then new.'id' = next value for gen_t1_id;
end!!
set term ; !!


set term !! ;
CREATE TRIGGER T2_BI FOR T1
ACTIVE BEFORE INSERT POSITION 0
AS
BEGIN
if (NEW.ID is NULL) then NEW.ID = GEN_ID(GEN_T2_ID, 1);
END!!
set term ; !!

ALTER TABLE M_LPA_EMERGENCIAS ALTER COLUMN RENAME id TO ID SET nextval('item_number_pk')
