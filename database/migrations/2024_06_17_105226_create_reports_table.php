<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Reports', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Reports', function (Blueprint $table) {
            //
            $table->id();
            $table->timestamps();

            $table->string('year')->nullable();
            $table->string('codigo_emergencia')->nullable();
            $table->string('departamento')->nullable();
            $table->string('municipio')->nullable();
            $table->string('tipo_emergencia')->nullable();
            $table->string('fecha_ern')->nullable();
            $table->string('links')->nullable();

        });
    }
}
