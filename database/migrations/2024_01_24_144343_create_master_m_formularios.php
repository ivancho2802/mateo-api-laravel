<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterMFormularios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('M_FORMULARIOS', function (Blueprint $table) {
            //
            //$table->bigIncrements('ID');
            $table->timestamps();

            $table->string('ID_EMPRESA')->nullable();
            $table->string('ID_M_FORMULARIOS')->nullable()->primary();
            $table->unsignedBigInteger('ID_M_USUARIOS');
            $table->string('ID_M_AREAS')->nullable();
            $table->string('ID_M_CLIENTES')->nullable();

            $table->foreign('ID_M_USUARIOS')
            ->references('ID')->on('M_USUARIOS');
            
            $table->timestamp('FECHA');
            $table->timestamp('FECHA_REGISTRO');
            $table->integer('VALOR_N')->nullable();

            $table->string('ASSET_UID')->nullable();

            $table->string('ACCION')->nullable();
            $table->string('UNICO')->nullable();
            $table->string('BARCODE')->nullable();
            $table->string('CAMPO1')->nullable();
            $table->string('CAMPO2')->nullable();
            $table->string('CAMPO3')->nullable();
            $table->string('CAMPO4')->nullable();
            $table->string('CAMPO5')->nullable();
            $table->string('ESTATUS')->nullable();
            $table->string('NOMBRES')->nullable();
            $table->string('VIA')->nullable();
            $table->string('TIPO')->nullable();
            $table->string('UID')->nullable();
            $table->string('URL_DATA')->nullable();
            $table->string('URL_CAMPOS')->nullable();
            $table->string('COMENTARIOS')->nullable();
            $table->string('GRUPO')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('M_FORMULARIOS', function (Blueprint $table) {
            //
        });
    }
}
