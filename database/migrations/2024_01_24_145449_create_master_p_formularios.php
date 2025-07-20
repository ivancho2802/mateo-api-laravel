<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterPFormularios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('P_FORMULARIOS', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->timestamps();

            $table->string('ID_P_FORMULARIOS');
            $table->string('ID_M_PRODUCTOS');
            $table->string('ID_M_FORMULARIOS');
            $table->string('ROTULO');
            $table->string('TIPO');
            $table->string('VALOR_REFERENCIA');
            $table->string('OPCIONES');
            $table->string('ID_M_USUARIOS');
            $table->string('ID_M_AREAS');
            
            $table->timestamp('FECHA');

            $table->string('ACCION');
            $table->string('UNICO');
            $table->string('BARCODE');
            $table->string('UNIDAD');

            $table->integer('POSICION');
            $table->integer('ANCHO');
            $table->integer('ID_EMPRESA');

            $table->string('GRUPO');
            $table->string('SUBGRUPO');
            $table->string('CAMPO1');
            $table->string('CAMPO2');
            $table->string('CAMPO3');
            $table->string('CAMPO4');
            $table->string('CAMPO5');

            $table->timestamp('FECHA_REGISTRO');

            $table->string('ESTATUS');
            $table->string('CODIGO1');

            $table->integer('POSICION_GRUPO');
            
            $table->string('VALOR');
            $table->string('REFERENCIA');
            $table->string('XROTULO');
            $table->string('XGRUPO');
            $table->string('TABLA');
            $table->string('CAMPO');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('P_FORMULARIOS', function (Blueprint $table) {
            //
        });
    }
}
