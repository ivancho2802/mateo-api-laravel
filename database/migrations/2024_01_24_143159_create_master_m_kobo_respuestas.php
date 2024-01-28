<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterMKoboRespuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('M_KOBO_RESPUESTAS', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->timestamps();
            //$table->integer('CONSECUTIVOS_CASES');
            $table->integer('_ID');

            $table->string('ID_M_KOBO_RESPUESTAS')->nullable();
            $table->string('ID_M_USUARIOS');
            $table->string('ID_M_AREAS')->nullable();
            $table->string('ID_M_KOBO_FORMULARIOS');
            $table->string('ID_M_FORMULARIOS');
            $table->string('ID_P_FORMULARIOS')->nullable();
            $table->string('ID_TMP_RESPUESTAS')->nullable();
            $table->string('ID_EMPRESA')->nullable();

            $table->date('FECHA')->nullable();
            $table->date('FECHA_REGISTRO')->nullable();

            $table->string('ACCION')->nullable();
            $table->string('UNICO')->nullable();
            $table->string('BARCODE')->nullable();
            $table->string('CAMPO1')->nullable();
            $table->string('CAMPO2')->nullable();
            $table->string('CAMPO3')->nullable();
            $table->string('CAMPO4')->nullable();
            $table->string('CAMPO5')->nullable();
            $table->string('ESTATUS')->nullable();
            $table->string('TIPO')->nullable();

            $table->integer('VALOR_N')->nullable();
            $table->timestamp('VALOR_F')->nullable();

            $table->string('REFERENCIA')->nullable();
            $table->string('UID')->nullable();
            $table->string('FUID')->nullable();
            $table->string('ROTULO_NEW')->nullable();
            $table->string('VALOR_C_NEW')->nullable();
            $table->string('XVALOR_NEW')->nullable();
            $table->string('XROTULO_NEW')->nullable();
            $table->string('VALOR_NEW')->nullable();

            $table->string('VALOR');
            $table->string('XVALOR')->nullable();
            $table->string('VALOR_C')->nullable();

            $table->string('ROTULO')->nullable();
            $table->string('XROTULO')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('M_KOBO_RESPUESTAS', function (Blueprint $table) {
            //
        });
    }
}
