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
        Schema::table('reports', function (Blueprint $table) {
            //
            $table->text('links')->nullable()->change();
            $table->string('tipo_respuesta')->nullable()->create();
            $table->string('tipo_producto')->nullable()->create();

            //$table->unsignedBigInteger('ID_M_USUARIOS')->create();
            //$table->foreign('ID_M_USUARIOS')
            //    ->references('ID')->on('M_USUARIOS')->create();
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
