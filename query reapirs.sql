insert into "M_LPA_EMERGENCIAS" ("cod_emergencia", "tipo_evento", "socio", "departamento", "municipio", "lugar_atencion", "updated_at", "created_at") values (Codigo de la emergencia, tipode , socio, departamento, municipio, lufgar, 2024-01-11 15:32:25, 2024-01-11 15:32:25);


insert into "M_LPA_EMERGENCIAS" ("cod_emergencia", "tipo_evento", "socio", "departamento", "municipio", "lugar_atencion", "updated_at", "created_at") values (Codigo de la emergencia, tipode , socio, departamento, municipio, lufgar, 2024-01-11 15:32:25, 2024-01-11 15:32:25)

connect "/opt/lampp/firebird/db/ach.gdb" user 'SYSDBA' password 'masterkey';

https://www.firebirdfaq.org/faq29/
--cambia la documentacio  par 2.5
https://firebirdsql.org/refdocs/langrefupd25-ddl-trigger.html
--configurar orimary key

  CREATE GENERATOR GEN_M_LPA_EMERGENCIAS_ID;
  SET GENERATOR GEN_M_LPA_EMERGENCIAS_ID TO 0;


  set term !! ;
  CREATE TRIGGER M_LPA_EMERGENCIAS_BI FOR M_LPA_EMERGENCIAS
  ACTIVE BEFORE INSERT POSITION 0
  AS
  BEGIN
  if (new.id is NULL) then new.id = GEN_ID(GEN_M_LPA_EMERGENCIAS_ID, 1);
  END!!
  set term ; !!


  CREATE GENERATOR GEN_M_LPA_PERSONAS_ID;
  SET GENERATOR GEN_M_LPA_PERSONAS_ID TO 0;

  set term !! ;
  create trigger M_LPA_PERSONAS_BI
    active before insert or update position 0
    on M_LPA_PERSONAS
  as
  begin
  if (new.id is NULL) then new.id = GEN_ID(GEN_M_LPA_PERSONAS_ID, 1);
  end!!
  set term ; !!


  CREATE GENERATOR GEN_M_LPAS_ID;
  SET GENERATOR GEN_M_LPAS_ID TO 0;

  set term !! ;
  create trigger M_LPAS_BI
    active before insert or update position 0
    on M_LPAS
  as
  begin
  if (new.id is NULL) then new.id = GEN_ID(GEN_M_LPAS_ID, 1);
  end!!
  set term ; !!

--alterrar tabla
ALTER TABLE M_LPA_EMERGENCIAS ALTER COLUMN id TO ID

-- altar tabla para cambiar el tipo de columna
ALTER TABLE M_LPA_PERSONAS add TELEFONO_TEMP varchar(255);
ALTER TABLE M_LPA_PERSONAS drop TELEFONO;
ALTER TABLE M_LPA_PERSONAS alter TELEFONO_TEMP to TELEFONO;


ALTER COLUMN RENAME id TO ID SET nextval('item_number_pk')
ALTER TABLE M_LPAS ADD STATUS VARCHAR(5);
ALTER TABLE M_LPAS ADD ID_M_USUARIOS VARCHAR(16);