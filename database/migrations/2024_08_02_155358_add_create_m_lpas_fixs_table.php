<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreateMLpasFixsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_lpa_fixes', function (Blueprint $table) {
            //
            $table->id();
            $table->timestamps();
            $table->string('documento')->nullable();
            $table->string('sexo')->nullable();
            $table->string('discapacidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_lpa_fixes', function (Blueprint $table) {
            //
        });
    }
}
