excel LPA_MIRE+ V1

__________azul oscuro "emergencia" ____________________
Codigo de la emergencia	(string) OBLIGATORIA
Tipo de evento	(string) OBLIGATORIA
    //no obligue estos valores
    //Confinamiento: Una población se encuentra confinada cuando sufre limitaciones a su libre movilidad por un período igual o superior a una semana, y además tiene acceso limitado a tres bienes o servicios, como: educación, salud, agua y saneamiento, medios de vida, entre otros. OCHA
    //Desplazamiento masivo: En Colombia, se entiende por desplazamiento masivo, el desplazamiento forzado conjunto de diez (10) o más hogares, o de cincuenta (50) o más personas. Se entiende por hogar, el grupo de personas, parientes o no, que viven bajo un mismo techo, comparten los alimentos y han sido afectadas por el desplazamiento forzado.(Decreto 4800 de 2011, artículo 45). 
    //Restricción a la movilidad: Las personas se pueden mover, pero bajo ciertas reglas, horarios y zonas que indiquen los GAO.
    //Desastre: Son perturbaciones graves del funcionamiento de una comunidad que exceden su capacidad para hacer frente con sus propios recursos. Los desastres pueden ser causados por peligros naturales, generados por el hombre y tecnológicos, así como por diversos factores que influyen en la exposición y vulnerabilidad de una comunidad. IFRC
    //Emergencias complejas: Cuando se presentan 2 o más eventos en un mismo periodo y afectan a la misma población
    //No aplica
Socio	(string) OBLIGATORIA
    //	ACH: Acción Contra el Hambre
    //	NRC: Consejo Noruego para Refugiados
    //	MDM: Médicos del Mundo
Departamento	(string) OBLIGATORIA
Municipio (string) OBLIGATORIA
"Lugar de atención (Resguardo, comunidad, IE)" (string)
__________end azul oscuro emergencia ________

__________GRIS "persona" ____________________
N. Identificación (number)	OBLIGATORIA
Tipo de documento	(string) OBLIGATORIA
Primer Nombre	(string) OBLIGATORIA
Otros Nombres	(string) 
Primer apellido	(string) OBLIGATORIA
Segundo apellido	(string)
Sexo (H/M)	(string) OBLIGATORIA
Identidad de género	(string)
Fecha de nacimiento	(string) OBLIGATORIA
Nacionalidad	(string) OBLIGATORIA
Perfil Migratorio	(string)
Situación / Condición	(string) OBLIGATORIA
Pertenencia Étnica	(string) OBLIGATORIA
Perfil del Participante	(string) OBLIGATORIA
Nivel de escolaridad	(string) 
Caracteristica Madre	(string) OBLIGATORIA
Situación de Discapacidad OBLIGATORIA
Dificultad para ver	(string) 
Dificultad para oir	(string)
Dificultad para caminar	(string)
Dificultad para recordar	(string)
Dificultad para el cuidado propio	(string)
Dificultad para comunicar	(string)
Celular	(numero)
__________END GRIS persona____________________

__________azul oscuro "datos del servicio"________________
Donante	(string) OBLIGATORIA
Código de Actividad (string) OBLIGATORIA	
Fecha de atención	(string) OBLIGATORIA
Representante del Hogar o Beneficiario Directo (string)	
ID del Hogar o Beneficiario Directo	(string)
__________end azul oscuro  datos del servicio____________________

__________GRIS "datos complementarios kits watch"____________________
Tipo de transferencia	(string)
Mecanismo de Entrega	-(string)
Proveedor Financiero	(string)
Monto que recibe en el mes en COP   (string)	
__________END GRIS datos complementarios kits watch____________________

__________naranja "datos de validacion de formularios" ____________________
Edad	"Rango
ECHO"	"Rango
BHA"	
Status	
Unicos	
Validación				
__________END naranja ____________________


M_LPA 
ID_M_LPA                        VARCHAR(16) Not Null
ID_M_USUARIOS                   VARCHAR(16) Nullable
ID_M_AREAS                      VARCHAR(16) Nullable
FECHA                           TIMESTAMP Nullable DEFAULT 'NOW'
FECHA_REGISTRO                  TIMESTAMP Nullable DEFAULT 'NOW'
ACCION                          VARCHAR(1) Nullable DEFAULT 'I'
UNICO                           VARCHAR(32) Nullable
BARCODE                         VARCHAR(20) Nullable
ID                              INTEGER Nullable
ID_EMPRESA                      VARCHAR(10) Nullable
CAMPO1                          VARCHAR(60) Nullable
CAMPO2                          VARCHAR(60) Nullable
CAMPO3                          VARCHAR(60) Nullable
CAMPO4                          VARCHAR(60) Nullable
CAMPO5                          VARCHAR(60) Nullable
ESTATUS                         VARCHAR(3) Nullable DEFAULT 'ACT'
LPA_ID                          INTEGER Nullable
NOMBRE                          VARCHAR(200) Nullable
APELLIDO1                       VARCHAR(200) Nullable
APELLIDO2                       VARCHAR(200) Nullable
FECHA_NACIM                     DATE Nullable
TIPO_IDENTIF                    INTEGER Nullable
NUM_IDENTIF                     VARCHAR(20) Nullable
SEXO_ID                         INTEGER Nullable
ACTIVIDAD_ID                    INTEGER Nullable
GENERO_ID                       INTEGER Nullable
DISCAP_ID                       INTEGER Nullable
TIPO_PERSONA_ID                 INTEGER Nullable
PAIS_ID                         INTEGER Nullable
CONDIC_ID                       INTEGER Nullable
ETNIA_ID                        INTEGER Nullable
ENTIDAD                         VARCHAR(100) Nullable
EMAIL                           VARCHAR(100) Nullable
TELEFONO                        VARCHAR(50) Nullable
COMUNIDAD                       VARCHAR(200) Nullable
ORIENTACION                     INTEGER Nullable
CODIGO                          VARCHAR(50) Nullable
GRUPO_ETAREO                    VARCHAR(200) Nullable
ORIENTACION_SEX_ID              INTEGER Nullable
FECHA_ACTIV                     DATE Nullable
DEPARTAMENTO                    VARCHAR(200) Nullable
XGRUPO_ETAREO                   VARCHAR(200) Nullable
CONSTRAINT PK_M_LPA:
  Primary key (ID_M_LPA)
CONSTRAINT UK_ID_M_LPA:
  Unique key (ID, ID_EMPRESA)

Triggers on Table M_LPA:
T_ID_M_LPA, Sequence: 0, Type: BEFORE INSERT, Active
T_F_M_LPA, Sequence: 0, Type: BEFORE UPDATE, Active
M_LPA_BI1, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active


M_LPA_ACTIVIDAD

ID_M_LPA_ACTIVIDAD              VARCHAR(16) Not Null
ID_M_USUARIOS                   VARCHAR(16) Nullable
ID_M_AREAS                      VARCHAR(16) Nullable
FECHA                           TIMESTAMP Nullable DEFAULT 'NOW'
FECHA_REGISTRO                  TIMESTAMP Nullable DEFAULT 'NOW'
ACCION                          VARCHAR(1) Nullable DEFAULT 'I'
UNICO                           VARCHAR(32) Nullable
BARCODE                         VARCHAR(20) Nullable
ID                              INTEGER Nullable
ID_EMPRESA                      VARCHAR(10) Nullable
CAMPO1                          VARCHAR(60) Nullable
CAMPO2                          VARCHAR(60) Nullable
CAMPO3                          VARCHAR(60) Nullable
CAMPO4                          VARCHAR(60) Nullable
CAMPO5                          VARCHAR(60) Nullable
ESTATUS                         VARCHAR(3) Nullable DEFAULT 'ACT'
ACTIVIDAD_ID                    INTEGER Nullable
DESCRIPCION                     VARCHAR(20) Nullable
XDESCRIPCION                    VARCHAR(20) Nullable
CONSTRAINT PK_M_LPA_ACTIVIDAD:
  Primary key (ID_M_LPA_ACTIVIDAD)
CONSTRAINT UK_ID_M_LPA_ACTIVIDAD:
  Unique key (ID, ID_EMPRESA)

Triggers on Table M_LPA_ACTIVIDAD:
T_ID_M_LPA_ACTIVIDAD, Sequence: 0, Type: BEFORE INSERT, Active
T_F_M_LPA_ACTIVIDAD, Sequence: 0, Type: BEFORE UPDATE, Active
T_M_LPA_ACTIVIDAD_XDESC, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active


M_LPA_BORRAR

ID_M_LPA                        VARCHAR(16) Not Null
ID_M_USUARIOS                   VARCHAR(16) Nullable
ID_M_AREAS                      VARCHAR(16) Nullable
FECHA                           TIMESTAMP Nullable DEFAULT 'NOW'
FECHA_REGISTRO                  TIMESTAMP Nullable DEFAULT 'NOW'
ACCION                          VARCHAR(1) Nullable DEFAULT 'I'
UNICO                           VARCHAR(32) Nullable
BARCODE                         VARCHAR(20) Nullable
ID                              INTEGER Nullable
ID_EMPRESA                      VARCHAR(10) Nullable
CAMPO1                          VARCHAR(60) Nullable
CAMPO2                          VARCHAR(60) Nullable
CAMPO3                          VARCHAR(60) Nullable
CAMPO4                          VARCHAR(60) Nullable
CAMPO5                          VARCHAR(60) Nullable
ESTATUS                         VARCHAR(3) Nullable DEFAULT 'ACT'
LPA_ID                          INTEGER Nullable
NOMBRE                          VARCHAR(200) Nullable
APELLIDO1                       VARCHAR(200) Nullable
APELLIDO2                       VARCHAR(200) Nullable
FECHA_NACIM                     DATE Nullable
TIPO_IDENTIF                    INTEGER Nullable
NUM_IDENTIF                     VARCHAR(20) Nullable
SEXO_ID                         INTEGER Nullable
ACTIVIDAD_ID                    INTEGER Nullable
GENERO_ID                       INTEGER Nullable
DISCAP_ID                       INTEGER Nullable
TIPO_PERSONA_ID                 INTEGER Nullable
PAIS_ID                         INTEGER Nullable
CONDIC_ID                       INTEGER Nullable
ETNIA_ID                        INTEGER Nullable
ENTIDAD                         VARCHAR(100) Nullable
EMAIL                           VARCHAR(100) Nullable
TELEFONO                        VARCHAR(50) Nullable
COMUNIDAD                       VARCHAR(200) Nullable
ORIENTACION                     INTEGER Nullable
CODIGO                          VARCHAR(50) Nullable
GRUPO_ETAREO                    VARCHAR(200) Nullable
ORIENTACION_SEX_ID              INTEGER Nullable
FECHA_ACTIV                     DATE Nullable
DEPARTAMENTO                    VARCHAR(200) Nullable
XGRUPO_ETAREO                   VARCHAR(200) Nullable
CONSTRAINT PK_M_LPA_NEW:
  Primary key (ID_M_LPA)
CONSTRAINT UK_ID_M_LPA_NEW:
  Unique key (ID, ID_EMPRESA)


M_LPA_CODIGOS

ID_M_LPA_CODIGOS                VARCHAR(16) Not Null
ID_M_USUARIOS                   VARCHAR(16) Nullable
ID_M_AREAS                      VARCHAR(16) Nullable
FECHA                           TIMESTAMP Nullable DEFAULT 'NOW'
FECHA_REGISTRO                  TIMESTAMP Nullable DEFAULT 'NOW'
ACCION                          VARCHAR(1) Nullable DEFAULT 'I'
UNICO                           VARCHAR(32) Nullable
BARCODE                         VARCHAR(20) Nullable
ID                              INTEGER Nullable
ID_EMPRESA                      VARCHAR(10) Nullable
CAMPO1                          VARCHAR(60) Nullable
CAMPO2                          VARCHAR(60) Nullable
CAMPO3                          VARCHAR(60) Nullable
CAMPO4                          VARCHAR(60) Nullable
CAMPO5                          VARCHAR(60) Nullable
ESTATUS                         VARCHAR(3) Nullable DEFAULT 'ACT'
CAMPO                           VARCHAR(50) Nullable
CODIGO                          VARCHAR(20) Nullable
DESCRIPCION                     VARCHAR(500) Nullable
CONSTRAINT PK_M_LPA_CODIGOS:
  Primary key (ID_M_LPA_CODIGOS)
CONSTRAINT UK_ID_M_LPA_CODIGOS:
  Unique key (ID, ID_EMPRESA)

Triggers on Table M_LPA_CODIGOS:
T_ID_M_LPA_CODIGOS, Sequence: 0, Type: BEFORE INSERT, Active
T_F_M_LPA_CODIGOS, Sequence: 0, Type: BEFORE UPDATE, Active


M_LPA_CONDIC

ID_M_LPA_CONDIC                 VARCHAR(16) Not Null
ID_M_USUARIOS                   VARCHAR(16) Nullable
ID_M_AREAS                      VARCHAR(16) Nullable
FECHA                           TIMESTAMP Nullable DEFAULT 'NOW'
FECHA_REGISTRO                  TIMESTAMP Nullable DEFAULT 'NOW'
ACCION                          VARCHAR(1) Nullable DEFAULT 'I'
UNICO                           VARCHAR(32) Nullable
BARCODE                         VARCHAR(20) Nullable
ID                              INTEGER Nullable
ID_EMPRESA                      VARCHAR(10) Nullable
CAMPO1                          VARCHAR(60) Nullable
CAMPO2                          VARCHAR(60) Nullable
CAMPO3                          VARCHAR(60) Nullable
CAMPO4                          VARCHAR(60) Nullable
CAMPO5                          VARCHAR(60) Nullable
ESTATUS                         VARCHAR(3) Nullable DEFAULT 'ACT'
CONDIC_ID                       INTEGER Nullable
DESCRIPCION                     VARCHAR(20) Nullable
XDESCRIPCION                    VARCHAR(20) Nullable
CONSTRAINT PK_M_LPA_CONDIC:
  Primary key (ID_M_LPA_CONDIC)
CONSTRAINT UK_ID_M_LPA_CONDIC:
  Unique key (ID, ID_EMPRESA)

Triggers on Table M_LPA_CONDIC:
T_ID_M_LPA_CONDIC, Sequence: 0, Type: BEFORE INSERT, Active
T_F_M_LPA_CONDIC, Sequence: 0, Type: BEFORE UPDATE, Active
T_M_LPA_CONDIC_XDESC, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active

M_LPA_DISCAP

ID_M_LPA_DISCAP                 VARCHAR(16) Not Null
ID_M_USUARIOS                   VARCHAR(16) Nullable
ID_M_AREAS                      VARCHAR(16) Nullable
FECHA                           TIMESTAMP Nullable DEFAULT 'NOW'
FECHA_REGISTRO                  TIMESTAMP Nullable DEFAULT 'NOW'
ACCION                          VARCHAR(1) Nullable DEFAULT 'I'
UNICO                           VARCHAR(32) Nullable
BARCODE                         VARCHAR(20) Nullable
ID                              INTEGER Nullable
ID_EMPRESA                      VARCHAR(10) Nullable
CAMPO1                          VARCHAR(60) Nullable
CAMPO2                          VARCHAR(60) Nullable
CAMPO3                          VARCHAR(60) Nullable
CAMPO4                          VARCHAR(60) Nullable
CAMPO5                          VARCHAR(60) Nullable
ESTATUS                         VARCHAR(3) Nullable DEFAULT 'ACT'
DISCAP_ID                       INTEGER Nullable
DESCRIPCION                     VARCHAR(20) Nullable
XDESCRIPCION                    VARCHAR(20) Nullable
CONSTRAINT PK_M_LPA_DISCAP:
  Primary key (ID_M_LPA_DISCAP)
CONSTRAINT UK_ID_M_LPA_DISCAP:
  Unique key (ID, ID_EMPRESA)

Triggers on Table M_LPA_DISCAP:
T_ID_M_LPA_DISCAP, Sequence: 0, Type: BEFORE INSERT, Active
T_F_M_LPA_DISCAP, Sequence: 0, Type: BEFORE UPDATE, Active
T_M_LPA_DISCAP_XDESC, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active

M_LPA_ENTIDAD

ID_M_LPA_ENTIDAD                VARCHAR(16) Not Null
ID_M_USUARIOS                   VARCHAR(16) Nullable
ID_M_AREAS                      VARCHAR(16) Nullable
FECHA                           TIMESTAMP Nullable DEFAULT 'NOW'
FECHA_REGISTRO                  TIMESTAMP Nullable DEFAULT 'NOW'
ACCION                          VARCHAR(1) Nullable DEFAULT 'I'
UNICO                           VARCHAR(32) Nullable
BARCODE                         VARCHAR(20) Nullable
ID                              INTEGER Nullable
ID_EMPRESA                      VARCHAR(10) Nullable
CAMPO1                          VARCHAR(60) Nullable
CAMPO2                          VARCHAR(60) Nullable
CAMPO3                          VARCHAR(60) Nullable
CAMPO4                          VARCHAR(60) Nullable
CAMPO5                          VARCHAR(60) Nullable
ESTATUS                         VARCHAR(3) Nullable DEFAULT 'ACT'
ENTIDAD_ID                      INTEGER Nullable
DESCRIPCION                     VARCHAR(20) Nullable
XDESCRIPCION                    VARCHAR(20) Nullable
CONSTRAINT PK_M_LPA_ENTIDAD:
  Primary key (ID_M_LPA_ENTIDAD)
CONSTRAINT UK_ID_M_LPA_ENTIDAD:
  Unique key (ID, ID_EMPRESA)

Triggers on Table M_LPA_ENTIDAD:
T_ID_M_LPA_ENTIDAD, Sequence: 0, Type: BEFORE INSERT, Active
T_F_M_LPA_ENTIDAD, Sequence: 0, Type: BEFORE UPDATE, Active
T_M_LPA_ENTIDAD_XDESC, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active


M_LPA_ETNIA

ID_M_LPA_ETNIA                  VARCHAR(16) Not Null
ID_M_USUARIOS                   VARCHAR(16) Nullable
ID_M_AREAS                      VARCHAR(16) Nullable
FECHA                           TIMESTAMP Nullable DEFAULT 'NOW'
FECHA_REGISTRO                  TIMESTAMP Nullable DEFAULT 'NOW'
ACCION                          VARCHAR(1) Nullable DEFAULT 'I'
UNICO                           VARCHAR(32) Nullable
BARCODE                         VARCHAR(20) Nullable
ID                              INTEGER Nullable
ID_EMPRESA                      VARCHAR(10) Nullable
CAMPO1                          VARCHAR(60) Nullable
CAMPO2                          VARCHAR(60) Nullable
CAMPO3                          VARCHAR(60) Nullable
CAMPO4                          VARCHAR(60) Nullable
CAMPO5                          VARCHAR(60) Nullable
ESTATUS                         VARCHAR(3) Nullable DEFAULT 'ACT'
ETNIA_ID                        INTEGER Nullable
DESCRIPCION                     VARCHAR(20) Nullable
XDESCRIPCION                    VARCHAR(20) Nullable
CONSTRAINT PK_M_LPA_ETNIA:
  Primary key (ID_M_LPA_ETNIA)
CONSTRAINT UK_ID_M_LPA_ETNIA:
  Unique key (ID, ID_EMPRESA)

Triggers on Table M_LPA_ETNIA:
T_ID_M_LPA_ETNIA, Sequence: 0, Type: BEFORE INSERT, Active
T_F_M_LPA_ETNIA, Sequence: 0, Type: BEFORE UPDATE, Active
T_M_LPA_ETNIA_XDESC, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active


M_LPA_GENERO

ID_M_LPA_GENERO                 VARCHAR(16) Not Null
ID_M_USUARIOS                   VARCHAR(16) Nullable
ID_M_AREAS                      VARCHAR(16) Nullable
FECHA                           TIMESTAMP Nullable DEFAULT 'NOW'
FECHA_REGISTRO                  TIMESTAMP Nullable DEFAULT 'NOW'
ACCION                          VARCHAR(1) Nullable DEFAULT 'I'
UNICO                           VARCHAR(32) Nullable
BARCODE                         VARCHAR(20) Nullable
ID                              INTEGER Nullable
ID_EMPRESA                      VARCHAR(10) Nullable
CAMPO1                          VARCHAR(60) Nullable
CAMPO2                          VARCHAR(60) Nullable
CAMPO3                          VARCHAR(60) Nullable
CAMPO4                          VARCHAR(60) Nullable
CAMPO5                          VARCHAR(60) Nullable
ESTATUS                         VARCHAR(3) Nullable DEFAULT 'ACT'
GENERO_ID                       INTEGER Nullable
DESCRIPCION                     VARCHAR(20) Nullable
XDESCRIPCION                    VARCHAR(20) Nullable
CONSTRAINT PK_M_LPA_GENERO:
  Primary key (ID_M_LPA_GENERO)
CONSTRAINT UK_ID_M_LPA_GENERO:
  Unique key (ID, ID_EMPRESA)

Triggers on Table M_LPA_GENERO:
T_ID_M_LPA_GENERO, Sequence: 0, Type: BEFORE INSERT, Active
T_F_M_LPA_GENERO, Sequence: 0, Type: BEFORE UPDATE, Active
T_M_LPA_GENERO_XDESC, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active


M_LPA_ORIENTACION

ID_M_LPA_ORIENTACION            VARCHAR(16) Not Null
ID_M_USUARIOS                   VARCHAR(16) Nullable
ID_M_AREAS                      VARCHAR(16) Nullable
FECHA                           TIMESTAMP Nullable DEFAULT 'NOW'
FECHA_REGISTRO                  TIMESTAMP Nullable DEFAULT 'NOW'
ACCION                          VARCHAR(1) Nullable DEFAULT 'I'
UNICO                           VARCHAR(32) Nullable
BARCODE                         VARCHAR(20) Nullable
ID                              INTEGER Nullable
ID_EMPRESA                      VARCHAR(10) Nullable
CAMPO1                          VARCHAR(60) Nullable
CAMPO2                          VARCHAR(60) Nullable
CAMPO3                          VARCHAR(60) Nullable
CAMPO4                          VARCHAR(60) Nullable
CAMPO5                          VARCHAR(60) Nullable
ESTATUS                         VARCHAR(3) Nullable DEFAULT 'ACT'
ORIENTACION_ID                  INTEGER Nullable
DESCRIPCION                     VARCHAR(20) Nullable
XDESCRIPCION                    VARCHAR(20) Nullable
CONSTRAINT PK_M_LPA_ORIENTACION:
  Primary key (ID_M_LPA_ORIENTACION)
CONSTRAINT UK_ID_M_LPA_ORIENTACION:
  Unique key (ID, ID_EMPRESA)

Triggers on Table M_LPA_ORIENTACION:
T_ID_M_LPA_ORIENTACI, Sequence: 0, Type: BEFORE INSERT, Active
T_F_M_LPA_ORIENTACIO, Sequence: 0, Type: BEFORE UPDATE, Active
T_M_LPA_ORIENTACION_XDESC, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active


M_LPA_PAIS

ID_M_LPA_PAIS                   VARCHAR(16) Not Null
ID_M_USUARIOS                   VARCHAR(16) Nullable
ID_M_AREAS                      VARCHAR(16) Nullable
FECHA                           TIMESTAMP Nullable DEFAULT 'NOW'
FECHA_REGISTRO                  TIMESTAMP Nullable DEFAULT 'NOW'
ACCION                          VARCHAR(1) Nullable DEFAULT 'I'
UNICO                           VARCHAR(32) Nullable
BARCODE                         VARCHAR(20) Nullable
ID                              INTEGER Nullable
ID_EMPRESA                      VARCHAR(10) Nullable
CAMPO1                          VARCHAR(60) Nullable
CAMPO2                          VARCHAR(60) Nullable
CAMPO3                          VARCHAR(60) Nullable
CAMPO4                          VARCHAR(60) Nullable
CAMPO5                          VARCHAR(60) Nullable
ESTATUS                         VARCHAR(3) Nullable DEFAULT 'ACT'
PAIS_ID                         INTEGER Nullable
DESCRIPCION                     VARCHAR(20) Nullable
XDESCRIPCION                    VARCHAR(20) Nullable
CONSTRAINT PK_M_LPA_PAIS:
  Primary key (ID_M_LPA_PAIS)
CONSTRAINT UK_ID_M_LPA_PAIS:
  Unique key (ID, ID_EMPRESA)

Triggers on Table M_LPA_PAIS:
T_ID_M_LPA_PAIS, Sequence: 0, Type: BEFORE INSERT, Active
T_F_M_LPA_PAIS, Sequence: 0, Type: BEFORE UPDATE, Active
T_M_LPA_PAIS_XDESC, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active



M_LPA_SEXO


ID_M_LPA_SEXO                   VARCHAR(16) Not Null
ID_M_USUARIOS                   VARCHAR(16) Nullable
ID_M_AREAS                      VARCHAR(16) Nullable
FECHA                           TIMESTAMP Nullable DEFAULT 'NOW'
FECHA_REGISTRO                  TIMESTAMP Nullable DEFAULT 'NOW'
ACCION                          VARCHAR(1) Nullable DEFAULT 'I'
UNICO                           VARCHAR(32) Nullable
BARCODE                         VARCHAR(20) Nullable
ID                              INTEGER Nullable
ID_EMPRESA                      VARCHAR(10) Nullable
CAMPO1                          VARCHAR(60) Nullable
CAMPO2                          VARCHAR(60) Nullable
CAMPO3                          VARCHAR(60) Nullable
CAMPO4                          VARCHAR(60) Nullable
CAMPO5                          VARCHAR(60) Nullable
ESTATUS                         VARCHAR(3) Nullable DEFAULT 'ACT'
SEXO_ID                         INTEGER Nullable
DESCRIPCION                     VARCHAR(20) Nullable
XDESCRIPCION                    VARCHAR(20) Nullable
CONSTRAINT PK_M_LPA_SEXO:
  Primary key (ID_M_LPA_SEXO)
CONSTRAINT UK_ID_M_LPA_SEXO:
  Unique key (ID, ID_EMPRESA)

Triggers on Table M_LPA_SEXO:
T_ID_M_LPA_SEXO, Sequence: 0, Type: BEFORE INSERT, Active
T_F_M_LPA_SEXO, Sequence: 0, Type: BEFORE UPDATE, Active
T_M_LPA_SEXO_XDESC, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active


M_LPA_TIPO_IDENTIF

ID_M_LPA_TIPO_IDENTIF           VARCHAR(16) Not Null
ID_M_USUARIOS                   VARCHAR(16) Nullable
ID_M_AREAS                      VARCHAR(16) Nullable
FECHA                           TIMESTAMP Nullable DEFAULT 'NOW'
FECHA_REGISTRO                  TIMESTAMP Nullable DEFAULT 'NOW'
ACCION                          VARCHAR(1) Nullable DEFAULT 'I'
UNICO                           VARCHAR(32) Nullable
BARCODE                         VARCHAR(20) Nullable
ID                              INTEGER Nullable
ID_EMPRESA                      VARCHAR(10) Nullable
CAMPO1                          VARCHAR(60) Nullable
CAMPO2                          VARCHAR(60) Nullable
CAMPO3                          VARCHAR(60) Nullable
CAMPO4                          VARCHAR(60) Nullable
CAMPO5                          VARCHAR(60) Nullable
ESTATUS                         VARCHAR(3) Nullable DEFAULT 'ACT'
TIPO_IDENTIF_ID                 INTEGER Nullable
DESCRIPCION                     VARCHAR(20) Nullable
XDESCRIPCION                    VARCHAR(20) Nullable
CONSTRAINT PK_M_LPA_TIPO_IDENTIF:
  Primary key (ID_M_LPA_TIPO_IDENTIF)
CONSTRAINT UK_ID_M_LPA_TIPO_IDENTIF:
  Unique key (ID, ID_EMPRESA)

Triggers on Table M_LPA_TIPO_IDENTIF:
T_ID_M_LPA_TIPO_IDEN, Sequence: 0, Type: BEFORE INSERT, Active
T_F_M_LPA_TIPO_IDENT, Sequence: 0, Type: BEFORE UPDATE, Active
T_M_LPA_TIPO_IDENTIF_XDESC, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active



M_LPA_TIPO_PERSONA

ID_M_LPA_TIPO_PERSONA           VARCHAR(16) Not Null
ID_M_USUARIOS                   VARCHAR(16) Nullable
ID_M_AREAS                      VARCHAR(16) Nullable
FECHA                           TIMESTAMP Nullable DEFAULT 'NOW'
FECHA_REGISTRO                  TIMESTAMP Nullable DEFAULT 'NOW'
ACCION                          VARCHAR(1) Nullable DEFAULT 'I'
UNICO                           VARCHAR(32) Nullable
BARCODE                         VARCHAR(20) Nullable
ID                              INTEGER Nullable
ID_EMPRESA                      VARCHAR(10) Nullable
CAMPO1                          VARCHAR(60) Nullable
CAMPO2                          VARCHAR(60) Nullable
CAMPO3                          VARCHAR(60) Nullable
CAMPO4                          VARCHAR(60) Nullable
CAMPO5                          VARCHAR(60) Nullable
ESTATUS                         VARCHAR(3) Nullable DEFAULT 'ACT'
TIPO_PERSONA_ID                 INTEGER Nullable
DESCRIPCION                     VARCHAR(20) Nullable
XDESCRIPCION                    VARCHAR(20) Nullable
CONSTRAINT PK_M_LPA_TIPO_PERSONA:
  Primary key (ID_M_LPA_TIPO_PERSONA)
CONSTRAINT UK_ID_M_LPA_TIPO_PERSONA:
  Unique key (ID, ID_EMPRESA)

Triggers on Table M_LPA_TIPO_PERSONA:
T_ID_M_LPA_TIPO_PERS, Sequence: 0, Type: BEFORE INSERT, Active
T_F_M_LPA_TIPO_PERSO, Sequence: 0, Type: BEFORE UPDATE, Active
T_M_LPA_TIPO_PERSONA_XDESC, Sequence: 1, Type: BEFORE INSERT OR UPDATE, Active
                                  
                                   
                             
                                    
        