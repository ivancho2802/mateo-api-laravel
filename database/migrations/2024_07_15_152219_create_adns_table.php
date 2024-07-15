<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adns', function (Blueprint $table) {
            //
            $table->id();
            $table->timestamps();
            $table->string('presupuesto_ach')->nullable();
            $table->string('presupuesto_total')->nullable();
            $table->string('otro')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* Schema::table('adns', function (Blueprint $table) {
            //
        }); */
    }
}
