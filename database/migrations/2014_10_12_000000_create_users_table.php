<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            // Code to create table
            Schema::table('users', function (Blueprint $table) {
                $table->id();
                //if (!Schema::hasColumn('users','name')) {
                $table->string('name');
                //
                //}

                //if (!Schema::hasColumn('users','email')) {
                //
                $table->string('email')->unique();
                //}


                //if (!Schema::hasColumn('users','email_verified_at')) {
                $table->timestamp('email_verified_at')->nullable();
                //
                //}


                //if (!Schema::hasColumn('users','password')) {
                $table->string('password');
                //
                //}

                $table->rememberToken();
                $table->timestamps();
            });
        } else {
            // Code to create table
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                //if (!Schema::hasColumn('users','name')) {
                $table->string('name');
                //
                //}

                //if (!Schema::hasColumn('users','email')) {
                //
                $table->string('email')->unique();
                //}


                //if (!Schema::hasColumn('users','email_verified_at')) {
                $table->timestamp('email_verified_at')->nullable();
                //
                //}


                //if (!Schema::hasColumn('users','password')) {
                $table->string('password');
                //
                //}

                $table->rememberToken();
                $table->timestamps();
            });

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('users');
    }
}
