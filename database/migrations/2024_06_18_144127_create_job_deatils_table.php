<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobDeatilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_deatils', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('dominio')->nullable();
            $table->string('name_key')->nullable();
            $table->string('uui')->nullable();
            $table->string('token')->nullable();
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
        Schema::dropIfExists('job_deatils');
    }
}
