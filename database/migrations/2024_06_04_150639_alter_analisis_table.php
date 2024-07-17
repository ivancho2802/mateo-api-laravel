<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAnalisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('analisis', function (Blueprint $table) {
            //mqr
            $table->text('acceso')->nullable()->default('No hay datos')->change();
            $table->text('participacion')->nullable()->default('No hay datos')->change();
            $table->text('ajustes')->nullable()->default('No hay datos')->change();
            $table->text('respuesta_rapida')->nullable()->default('No hay datos')->change();
            $table->text('acompanamiento')->nullable()->default('No hay datos')->change();

            
            $table->text('recuperacion_temprana')->nullable()->default('No hay datos')->change();
            
            $table->text('acompanamiento_rt')->nullable()->default('No hay datos')->change();
            $table->text('acceso_rt')->nullable()->default('No hay datos')->change();
            $table->text('participacion_rt')->nullable()->default('No hay datos')->change();
            $table->text('ajustes_rt')->nullable()->default('No hay datos')->change();

            $table->text('texto')->nullable()->default('No hay datos')->change();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
