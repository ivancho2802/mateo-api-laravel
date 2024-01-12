<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterLpaPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('M_LPA_PERSONAS', function (Blueprint $table) {
            //
            $table->integer('ID')->primary();
            //N. Identificación (number)	OBLIGATORIA
            $table->string('DOCUMENTO')->unique();

            //Tipo de DOCUMENTO	(string) OBLIGATORIA
            $table->string('TIPO_DOCUMENTO');
            
            //Primer Nombre	(string) OBLIGATORIA
            $table->string('NOMBRE_PRIMERO');
            
            //Otros Nombres	(string) 
            $table->string('NOMBRE_OTROS')->nullable();

            //Primer apellido	(string) OBLIGATORIA
            $table->string('APELLIDO_PRIMERO');

            //Segundo apellido	(string)
            $table->string('APELLIDO_OTRO')->nullable();

            //Sexo (H/M)	(string) OBLIGATORIA
            $table->string('GENERO');

            //Identidad de género	(string)
            $table->string('IDENTIDAD_GENERO')->nullable();
            
            //Fecha de nacimiento	(string) OBLIGATORIA
            $table->date('FECHA_NACIMIENTO');
            
            //Nacionalidad	(string) OBLIGATORIA
            $table->string('NACIONALIDAD');
            
            //Perfil Migratorio	(string)
            $table->string('PERFIL_MIGRATORIO')->nullable();
            
            //Situación / Condición	(string) OBLIGATORIA
            $table->string('SITUACION');
            
            //Pertenencia Étnica	(string) OBLIGATORIA
            $table->string('ETNIA');

            //Perfil del Participante	(string) OBLIGATORIA
            $table->string('PERFIL');
            
            //Nivel de escolaridad	(string) 
            $table->string('NIVEL_ESCOLARIDAD')->nullable();

            //Caracteristica Madre	(string) OBLIGATORIA
            $table->string('CARACTERISTICAS_MADRE');

            //Situación de Discapacidad OBLIGATORIA
                //Dificultad para ver	(string) 
                //Dificultad para oir	(string)
                //Dificultad para caminar	(string)
                //Dificultad para recordar	(string)
                //Dificultad para el cuidado propio	(string)
                //Dificultad para comunicar	(string)
            $table->string('DISCAPACIDAD_VER')->nullable();
            $table->string('DISCAPACIDAD_OIR')->nullable();
            $table->string('DISCAPACIDAD_CAMINAR')->nullable();
            $table->string('DISCAPACIDAD_RECORDAR')->nullable();
            $table->string('DISCAPACIDAD_CUIDADO_PROPIO')->nullable();
            $table->string('DISCAPACIDAD_COMUNICAR')->nullable();
            
            //Celular	(numero)
            $table->string('TELEFONO')->nullable();
            
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
        Schema::table('M_LPA_PERSONA', function (Blueprint $table) {
            //
        });
    }
}
