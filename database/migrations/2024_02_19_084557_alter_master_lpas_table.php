<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMasterLpasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('"M_LPAS"', function (Blueprint $table) {
            //$table->string('COD_ACTIVIDAD')->change();
            /* $table->foreign('COD_ACTIVIDAD')
                ->references('cod')->on('activities')->change(); */
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
