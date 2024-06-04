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
            $table->text('acceso')->nullable();
            $table->text('participacion')->nullable();
            $table->text('ajustes')->nullable();
            $table->text('respuesta_rapida')->nullable();
            $table->text('recuperacion_temprana')->nullable();
            $table->text('acompanamiento')->nullable();
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
