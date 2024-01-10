<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterLpaEmergenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('M_LPA_EMERGENCIAS', function (Blueprint $table) {
            //
            $table->id();

            //Codigo de la emergencia	(string) OBLIGATORIA
            $table->string('cod_emergencia');//->unique();
            
            //Tipo de evento	(string) OBLIGATORIA
                //no obligue estos valores
                //Confinamiento: Una población se encuentra confinada cuando sufre limitaciones a su libre movilidad por un período igual o superior a una semana, y además tiene acceso limitado a tres bienes o servicios, como: educación, salud, agua y saneamiento, medios de vida, entre otros. OCHA
                //Desplazamiento masivo: En Colombia, se entiende por desplazamiento masivo, el desplazamiento forzado conjunto de diez (10) o más hogares, o de cincuenta (50) o más personas. Se entiende por hogar, el grupo de personas, parientes o no, que viven bajo un mismo techo, comparten los alimentos y han sido afectadas por el desplazamiento forzado.(Decreto 4800 de 2011, artículo 45). 
                //Restricción a la movilidad: Las personas se pueden mover, pero bajo ciertas reglas, horarios y zonas que indiquen los GAO.
                //Desastre: Son perturbaciones graves del funcionamiento de una comunidad que exceden su capacidad para hacer frente con sus propios recursos. Los desastres pueden ser causados por peligros naturales, generados por el hombre y tecnológicos, así como por diversos factores que influyen en la exposición y vulnerabilidad de una comunidad. IFRC
                //Emergencias complejas: Cuando se presentan 2 o más eventos en un mismo periodo y afectan a la misma población
                //No aplica
            $table->string('tipo_evento');

            //Socio	(string) OBLIGATORIA
                //	ACH: Acción Contra el Hambre
                //	NRC: Consejo Noruego para Refugiados
                //	MDM: Médicos del Mundo
            $table->string('socio');

            //Departamento	(string) OBLIGATORIA
            $table->string('departamento');

            //Municipio (string) OBLIGATORIA
            $table->string('municipio');

            //"Lugar de atención (Resguardo, comunidad, IE)" (string)
            $table->string('lugar_atencion')->nullable();

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
        Schema::table('M_LPA_EMERGENCIA', function (Blueprint $table) {
            //
        });
    }
}
