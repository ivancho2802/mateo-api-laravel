<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities_directories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('cod_actividad')->unsigned()->nullable();

            $table->foreign('cod_actividad')
                ->references('cod')->on('activities');
            
            $table->string('sectores_echo')->nullable();
            $table->string('sectores_bha')->nullable();
            $table->string('indicadores_bha')->nullable();
            $table->string('indicadores_echo')->nullable();
            $table->string('sectores_aecid')->nullable();
            $table->string('indicadores_aecid')->nullable();
            $table->string('type_asistence_kind_cash_services');
            $table->string('fase');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities_directories');
    }
}
