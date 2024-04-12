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
