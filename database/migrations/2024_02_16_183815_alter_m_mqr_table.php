<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMMqrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('"M_MQR"', function (Blueprint $table) {
            $table->text('RECIVE')->nullable()->change();
            $table->string('RANGE_EDAD')->nullable()->change();
            $table->string('ADDRESS')->nullable()->change();
            $table->string('VALID')->nullable()->change();
            $table->string('SUB_CATEGORY')->nullable();

            
            $table->string('TIPO_INTERVE')->nullable()->create();
            $table->string('COD_EMERGENCIA')->nullable()->create();
            $table->string('NACIONALIDAD')->nullable()->create();
            $table->string('EDO')->nullable()->create();
            $table->string('REVI_INTER')->nullable()->create();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
