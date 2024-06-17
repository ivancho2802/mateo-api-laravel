<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Reports', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Reports', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('ID_M_USUARIOS')->create();
            $table->foreign('ID_M_USUARIOS')
                ->references('ID')->on('M_USUARIOS')->create();
                
        });
    }
}
