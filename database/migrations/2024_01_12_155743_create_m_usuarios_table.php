<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('M_USUARIOS', function (Blueprint $table) {
            $table->id();

            $table->string('ID_M_USUARIO');
            $table->string('NOMBRES');
/* 
                         VARCHAR(200) Nullable
APELLIDOS                       VARCHAR(60) Nullable
LOGIN                           VARCHAR(60) Not Null
CLAVE                           VARCHAR(32) Not Null
ID_M_GRUPOS                     VARCHAR(16) Not Null
ID_M_USUARIOS                   VARCHAR(16) Nullable
ID_M_AREAS                      VARCHAR(16) Nullable
FECHA                           TIMESTAMP Nullable DEFAULT 'NOW'
ACCION                          VARCHAR(1) Nullable DEFAULT 'I'
UNICO                           VARCHAR(32) Nullable
BARCODE                         VARCHAR(20) Nullable
ID                              INTEGER Nullable
ID_EMPRESA                      VARCHAR(10) Nullable
HUELLA                          VARCHAR(300) Nullable
SESSION_ID                      VARCHAR(32) Nullable
ESTATUS                         VARCHAR(3) Nullable
IP                              VARCHAR(20) Nullable
CAMPO1                          VARCHAR(60) Nullable
CAMPO2                          VARCHAR(60) Nullable
CAMPO3                          VARCHAR(60) Nullable
CAMPO4                          VARCHAR(60) Nullable
CAMPO5                          VARCHAR(60) Nullable
NIVEL                           INTEGER Nullable DEFAULT 0
ROTULO                          VARCHAR(200) Nullable
FECHA_REGISTRO                  TIMESTAMP Nullable DEFAULT 'NOW'
CODIGO1                         INTEGER Nullable
CODIGO2                         VARCHAR(32) Nullable
CODIGO3                         VARCHAR(32) Nullable
ID_M_NIVELES                    VARCHAR(16) Nullable
NOMBRE_COMPLETO                 VARCHAR(121) Nullable
ID_M_CLIENTES                   VARCHAR(16) Nullable
ID_M_DEPARTAMENTOS              VARCHAR(16) Nullable DEFAULT NULL
FRASE                           VARCHAR(60) Nullable
FORMULA                         VARCHAR(60) Nullable
FECHA_NAC                       TIMESTAMP Nullable
CONDICION_SESION                VARCHAR(1) Nullable
AGENTE_ESTATUS                  VARCHAR(20) Nullable DEFAULT 'OFFLINE'
LLAVE                           VARCHAR(60) Nullable
ID_M_VENDEDORES                 VARCHAR(16) Nullable
NAVEGADOR                       VARCHAR(200) Nullable
CORREO                          VARCHAR(60) Nullable
 */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('M_USUARIOS');
    }
}
