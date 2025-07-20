<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('sector');
            $table->string('cod')->unique();
            $table->string('actividad');
            
            $table->unsignedBigInteger('ID_M_USUARIOS');
            $table->foreign('ID_M_USUARIOS')
                ->references('ID')->on('M_USUARIOS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('activities');
    }
}
