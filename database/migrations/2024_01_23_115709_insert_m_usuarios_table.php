<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InsertMUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $password = Hash::make('1234');


        DB::table('M_USUARIOS')->insert(
            array(
                'ID_M_USUARIO'=>'1',
                'NOMBRES'=>'laura',
                'APELLIDOS'=>'laura',
                'LOGIN'=>'laura',
                'CLAVE'=>$password
            )
        );
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
