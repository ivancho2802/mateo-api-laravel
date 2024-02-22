<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBhaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bhas', function (Blueprint $table) {
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
        //Schema::dropIfExists('bhas');
    }
}
