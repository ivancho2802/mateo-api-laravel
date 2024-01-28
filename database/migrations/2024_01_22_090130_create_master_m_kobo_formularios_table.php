<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterMKoboFormulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('M_KOBO_FORMULARIOS', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->integer('_ID');
            $table->integer('ID')->nullable();

            $table->string('ID_M_KOBO_FORMULARIOS')->nullable();
            $table->string('ID_M_USUARIOS');
            $table->string('ID_M_AREAS')->nullable();
            $table->string('ID_M_FORMULARIOS');
            $table->string('ID_M_LOCALIDADES')->nullable();
            $table->string('ID_EMPRESA')->nullable();

            $table->timestamp('FECHA')->nullable();
            $table->timestamp('FECHA_REGISTRO')->nullable();

            $table->string('ACCION')->nullable();
            $table->string('UNICO')->nullable();
            $table->string('BARCODE')->nullable();

            $table->string('CAMPO1');
            $table->string('CAMPO2')->nullable();
            $table->string('CAMPO3')->nullable();
            $table->string('CAMPO4')->nullable();
            $table->string('CAMPO5')->nullable();
            $table->string('ESTATUS');

            $table->timestamp('FECHA_FORMULARIO')->nullable();

            $table->string('UID')->nullable();
            $table->string('FUID')->nullable();
            $table->string('CORREO_TEST')->nullable();

            $table->date('FECHA_ESTADISTICA')->nullable();

            $table->string('DEPARTAMENTO')->nullable();
            $table->string('REGION')->nullable();
            $table->string('CORREO')->nullable();
            $table->string('FUNICO')->nullable();
            $table->string('MUNICIPIO')->nullable();

            $table->string('CODIGO_ALERTA')->nullable();
            $table->string('XCODIGO_ALERTA')->nullable();
            $table->string('PREFIJO_ALERTA')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_m_kobo_formularios');
    }
}
