<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterMqrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('M_MQR', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->timestamps();

            $table->string('ORG_REPORT');
            $table->integer('CONSECUTIVOS_CASES');
            $table->string('MONTH_REPORT');
            $table->string('DATE_IN');
            $table->string('CHANNEL_IN');
            $table->string('CATEGORY');
            $table->string('SUB_CATEGORY');
            $table->string('THEME')->nullable();
            $table->string('ETNIA');
            $table->string('SEXO');
            $table->string('RANGE_EDAD');
            $table->string('DEPARTMENT');
            $table->string('MUNICICIO');
            $table->string('ADDRESS');
            $table->string('VALID');
            $table->string('RECIVE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('M_MQR');
    }
}
