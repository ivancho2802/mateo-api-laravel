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
            $table->string('SUB_CATEGORY')->nullable()->change();

            $table->string('TIPO_INTERVE')->nullable()->change();
            $table->string('COD_EMERGENCIA')->nullable()->change();
            $table->string('NACIONALIDAD')->nullable()->change();
            $table->string('EDO')->nullable()->change();
            $table->string('DERI_INTER')->nullable()->change();

            $table->string('DEPARTMENT')->nullable()->change();
            $table->string('MUNICICIO')->nullable()->change();

            
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
