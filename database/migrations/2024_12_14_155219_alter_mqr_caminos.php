<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMqrCaminos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mqr_caminos', function (Blueprint $table) {
            //
            $table->text('hallazgos_programaticos')->nullable()->change();
            $table->text('recomendaciones_programaticas')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* Schema::table('mqr_caminos', function (Blueprint $table) {
            //
        }); */
    }
}
