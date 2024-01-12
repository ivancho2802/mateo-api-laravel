<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterLpasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('M_LPAS', function (Blueprint $table) {
            //
            $table->integer('ID')->primary();

            $table->unsignedBigInteger('FK_LPA_EMERGENCIA');
            $table->unsignedBigInteger('FK_LPA_PERSONA');
            $table->timestamps();

            $table->foreign('FK_LPA_EMERGENCIA')
            ->nullable()
            ->references('ID')->on('M_LPA_EMERGENCIAS');

            
            $table->foreign('FK_LPA_PERSONA')
            ->nullable()
            ->references('ID')->on('M_LPA_PERSONAS');

            //----------------DATOS DEL SERVICIO

            //Donante	(string) OBLIGATORIA
            $table->string('DONANTE');

            //Código de Actividad (string) OBLIGATORIA	
            $table->string('COD_ACTIVIDAD');

            //Fecha de atención	(string) OBLIGATORIA
            $table->date('FECHA_ATENCION');

            //Representante del Hogar o Beneficiario Directo (string)	
            $table->string('REPRESENTANTE')->nullable();
            //ID del Hogar o Beneficiario Directo	(string)
            $table->string('DOC_REPRESENTANTE')->nullable();
            //----------------DATOS DEL SERVICIO END


            //----------------DATOS COMPLEMENTARIO KIT WATCH
            //Tipo de transferencia	(string)
            $table->string('TIPO_TRANFERENCIA')->nullable();
            
            //Mecanismo de Entrega	-(string)
            $table->string('MODO_ENTREGA')->nullable();
            
            //Proveedor Financiero	(string)
            $table->string('PROVEEDOR_FINANCIERO')->nullable();
            
            //Monto que recibe en el mes en COP   (string)	
            $table->string('MONTO_MENSUAL')->nullable();
            //----------------DATOS COMPLEMENTARIO KIT WATCH END

            
            //----------------naranja "datos de validacion de formularios
            //Edad	
            //"Rango ECHO"	
            //"Rango BHA"	
            //Status	
            //Unicos	
            //Validación				
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('M_LPA', function (Blueprint $table) {
            //
        });
    }
}
