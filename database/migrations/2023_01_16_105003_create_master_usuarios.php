<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterUsuarios extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('M_USUARIOS', function (Blueprint $table) {
            $table->bigIncrements('ID');

            $table->string('ID_M_USUARIO');
            $table->string('NOMBRES');
            $table->string('APELLIDOS');
            $table->string('LOGIN');
            $table->string('CLAVE');
            $table->string('ID_M_GRUPOS');
            $table->string('ID_M_AREAS');
            $table->string('FECHA');
            $table->string('ACCION');
            $table->string('UNICO');
            $table->string('BARCODE');
            $table->string('ID_EMPRESA');
            $table->string('HUELLA');
            $table->string('SESSION_ID');
            $table->string('ESTATUS');
            $table->string('IP');
            $table->string('CAMPO1');
            $table->string('CAMPO2');
            $table->string('CAMPO3');
            $table->string('CAMPO4');
            $table->string('CAMPO5');
            $table->integer('NIVEL');
            $table->string('ROTULO');
            $table->date('FECHA_REGISTRO');
            $table->integer('CODIGO1');
            $table->string('CODIGO2');
            $table->string('CODIGO3');
            $table->string('ID_M_NIVELES');
            $table->string('NOMBRE_COMPLETO');
            $table->string('ID_M_CLIENTES');
            $table->string('ID_M_DEPARTAMENTOS');
            $table->string('FRASE');
            $table->date('FECHA_NAC');
            $table->string('CONDICION_SESION');
            $table->string('AGENTE_ESTATUS');
            $table->string('LLAVE');
            $table->string('ID_M_VENDEDORES');
            $table->string('NAVEGADOR');
            $table->string('CORREO');
            
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
