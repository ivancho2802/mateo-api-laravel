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
            $table->increments('id')->primary();
            //N. Identificación (number)	OBLIGATORIA
            $table->string('documento')->unique();

            //Tipo de documento	(string) OBLIGATORIA
            $table->string('tipo_documento');
            
            //Primer Nombre	(string) OBLIGATORIA
            $table->string('nombre_primero');
            
            //Otros Nombres	(string) 
            $table->string('nombre_otros')->nullable();

            //Primer apellido	(string) OBLIGATORIA
            $table->string('apellido_primero');

            //Segundo apellido	(string)
            $table->string('apellido_otros')->nullable();

            //Sexo (H/M)	(string) OBLIGATORIA
            $table->string('genero');

            //Identidad de género	(string)
            $table->string('identidad_genero')->nullable();
            
            //Fecha de nacimiento	(string) OBLIGATORIA
            $table->date('fecha_nacimiento');
            
            //Nacionalidad	(string) OBLIGATORIA
            $table->string('nacionalidad');
            
            //Perfil Migratorio	(string)
            $table->string('perfil_migratorio')->nullable();
            
            //Situación / Condición	(string) OBLIGATORIA
            $table->string('situacion');
            
            //Pertenencia Étnica	(string) OBLIGATORIA
            $table->string('etnia');

            //Perfil del Participante	(string) OBLIGATORIA
            $table->string('perfil');
            
            //Nivel de escolaridad	(string) 
            $table->string('nivel_escolaridad')->nullable();

            //Caracteristica Madre	(string) OBLIGATORIA
            $table->string('caracteristica_madre');

            //Situación de Discapacidad OBLIGATORIA
                //Dificultad para ver	(string) 
                //Dificultad para oir	(string)
                //Dificultad para caminar	(string)
                //Dificultad para recordar	(string)
                //Dificultad para el cuidado propio	(string)
                //Dificultad para comunicar	(string)
            $table->string('discapacidad_ver')->nullable();
            $table->string('discapacidad_oir')->nullable();
            $table->string('discapacidad_caminar')->nullable();
            $table->string('discapacidad_recordar')->nullable();
            $table->string('discapacidad_cuidadopropio')->nullable();
            $table->string('discapacidad_comunicar')->nullable();
            
            //Celular	(numero)
            $table->bigInteger('telefono')->nullable();
            
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
