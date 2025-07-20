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
            $table->text('THEME')->nullable();
            $table->string('ETNIA');
            $table->string('SEXO');
            $table->string('DEPARTMENT');
            $table->string('MUNICICIO');

            $table->text('RECIVE')->nullable()->create();
            $table->string('RANGE_EDAD')->nullable()->create();
            $table->string('ADDRESS')->nullable()->create();
            $table->string('VALID')->nullable()->create();
            $table->string('SUB_CATEGORY')->nullable()->create();

            $table->string('TIPO_INTERVE')->nullable()->create();
            $table->string('COD_EMERGENCIA')->nullable()->create();
            $table->string('NACIONALIDAD')->nullable()->create();
            $table->string('EDO')->nullable()->create();
            $table->string('DERI_INTER')->nullable()->create();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('M_MQR');
    }
}
