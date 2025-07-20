<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEchoActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('echo_activity', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('fk_echo')->unsigned();

            $table->foreign('fk_echo')
                ->references('cod')->on('echos');

            $table->string('fk_activity')->unsigned();

            $table->foreign('fk_activity')
                ->references('cod')->on('activities');

                
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
        //Schema::dropIfExists('echo_activity');
    }
}
