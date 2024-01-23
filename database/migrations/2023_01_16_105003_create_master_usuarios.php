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
            $table->string('ID_M_GRUPOS')->nullable();
            $table->string('ID_M_AREAS')->nullable();
            $table->string('FECHA')->nullable();
            $table->string('ACCION')->nullable();
            $table->string('UNICO')->nullable();
            $table->string('BARCODE')->nullable();
            $table->string('ID_EMPRESA')->nullable();
            $table->string('HUELLA')->nullable();
            $table->string('SESSION_ID')->nullable();
            $table->string('ESTATUS')->nullable();
            $table->string('IP')->nullable();
            $table->string('CAMPO1')->nullable();
            $table->string('CAMPO2')->nullable();
            $table->string('CAMPO3')->nullable();
            $table->string('CAMPO4')->nullable();
            $table->string('CAMPO5')->nullable();
            $table->integer('NIVEL')->nullable();
            $table->string('ROTULO')->nullable();
            $table->date('FECHA_REGISTRO')->nullable();
            $table->integer('CODIGO1')->nullable();
            $table->string('CODIGO2')->nullable();
            $table->string('CODIGO3')->nullable();
            $table->string('ID_M_NIVELES')->nullable();
            $table->string('NOMBRE_COMPLETO')->nullable();
            $table->string('ID_M_CLIENTES')->nullable();
            $table->string('ID_M_DEPARTAMENTOS')->nullable();
            $table->string('FRASE')->nullable();
            $table->date('FECHA_NAC')->nullable();
            $table->string('CONDICION_SESION')->nullable();
            $table->string('AGENTE_ESTATUS')->nullable();
            $table->string('LLAVE')->nullable();
            $table->string('ID_M_VENDEDORES')->nullable();
            $table->string('NAVEGADOR')->nullable();
            $table->string('CORREO')->nullable();
            
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
