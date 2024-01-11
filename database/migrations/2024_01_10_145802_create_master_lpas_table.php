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
            $table->increments('id')->primary();
            
            $table->unsignedBigInteger('fk_lpa_emergencia');
            $table->unsignedBigInteger('fk_lpa_persona');
            $table->timestamps();

            $table->foreign('fk_lpa_emergencia')
            ->nullable()
            ->references('id')->on('M_LPA_EMERGENCIAS');

            
            $table->foreign('fk_lpa_persona')
            ->nullable()
            ->references('id')->on('M_LPA_PERSONAS');

            //----------------DATOS DEL SERVICIO

            //Donante	(string) OBLIGATORIA
            $table->string('donante');

            //Código de Actividad (string) OBLIGATORIA	
            $table->string('cod_actividad');

            //Fecha de atención	(string) OBLIGATORIA
            $table->date('fecha_atencion');

            //Representante del Hogar o Beneficiario Directo (string)	
            $table->string('representante')->nullable();
            //ID del Hogar o Beneficiario Directo	(string)
            $table->string('doc_representante')->nullable();
            //----------------DATOS DEL SERVICIO END


            //----------------DATOS COMPLEMENTARIO KIT WATCH
            //Tipo de transferencia	(string)
            $table->string('tipo_tranferencia')->nullable();
            
            //Mecanismo de Entrega	-(string)
            $table->string('modo_entrega')->nullable();
            
            //Proveedor Financiero	(string)
            $table->string('proveedor_financiero')->nullable();
            
            //Monto que recibe en el mes en COP   (string)	
            $table->string('monto_mensual')->nullable();
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
