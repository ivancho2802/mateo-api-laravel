<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMqrCaminos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mqr_caminos', function (Blueprint $table) {
            //
            $table->id();
            $table->timestamps();
            $table->string('date_entry')->nullable();
            $table->string('fecha')->nullable();
            $table->string('mes')->nullable();
            $table->string('organizacion')->nullable();
            $table->string('tipo_intervencion')->nullable();
            $table->string('codigo')->nullable();
            $table->string('departamento')->nullable();
            $table->string('municipio')->nullable();
            $table->string('comunidad')->nullable();
            $table->string('ninas')->nullable();
            $table->string('ninos')->nullable();
            $table->string('mujeres')->nullable();
            $table->string('hombres')->nullable();
            $table->string('hallazgos_programaticos')->nullable();
            $table->string('recomendaciones_programaticas')->nullable();
            $table->string('primer_contacto_alegría')->nullable();
            $table->string('primer_contacto_aburrimiento')->nullable();
            $table->string('primer_contacto_tristeza')->nullable();
            $table->string('primer_contacto_enojo')->nullable();
            $table->string('primer_contacto_NS_NR')->nullable();
            $table->string('presentacion_MIRE_alegría')->nullable();
            $table->string('presentacion_MIRE_aburrimiento')->nullable();
            $table->string('presentacion_MIRE')->nullable();
            $table->string('enojo')->nullable();
            $table->string('NS_NR')->nullable();
            $table->string('alegría')->nullable();
            $table->string('aburrimiento')->nullable();
            $table->string('presentacion_MIRE_tristeza')->nullable();
            $table->string('presentacion_MIRE_enojo')->nullable();
            $table->string('presentacion_MIRE_NS_NR')->nullable();
            $table->string('finalizacion_atencion_alegría')->nullable();
            $table->string('finalizacion_atencion_aburrimiento')->nullable();
            $table->string('finalizacion_atencion_tristeza')->nullable();
            $table->string('finalizacion_atencion_enojo')->nullable();
            $table->string('finalizacion_atencion_NS_NR')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* Schema::table('mqr_caminos', function (Blueprint $table) {
            //
        }); */
    }
}
