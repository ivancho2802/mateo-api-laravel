<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEchosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('echos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cod')->unique();
            $table->string('indicador');
            
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
        //Schema::dropIfExists('echo');
    }
}
