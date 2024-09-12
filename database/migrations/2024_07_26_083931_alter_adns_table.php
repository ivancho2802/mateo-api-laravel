<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAdnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('adns', function (Blueprint $table) {
            $table->string('dinero_ahorrado_x_persona')->nullable()->create();
            $table->string('grupo_ahorro')->nullable()->change();
            $table->string('personas_bancarizadas')->nullable()->change();
            $table->string('tasa_cambio')->nullable()->create();

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
