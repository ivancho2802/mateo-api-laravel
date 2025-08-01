<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdatecreareToDcontactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('D_CONTACTS', function (Blueprint $table) {
            //
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('D_CONTACTS', function (Blueprint $table) {
            //
            //$table->dropColumn('updated_at'); 
            //$table->dropColumn('created_at'); 
        });
    }
}
