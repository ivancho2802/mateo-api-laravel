<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMqrSpaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mqr_spaces', function (Blueprint $table) {
            //
            $table->id();
            $table->timestamps();
            $table->string('date_entry')->nullable();
            $table->string('org_report')->nullable();
            $table->string('type_act')->nullable();
            $table->string('departamento')->nullable();
            $table->string('municipio')->nullable();
            $table->string('women')->nullable();
            $table->string('men')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* Schema::table('mqr_spaces', function (Blueprint $table) {
            //
        }); */
    }
}
