<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function down()
    {
        Schema::drop('users');
    }

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table
                ->bigIncrements('id')
            ;
            $table
                ->string('name')
            ;
            $table
                ->string('email')
            ;
            $table
                ->string('password')
            ;
            $table
                ->timestamp('created_at')
            ;
        });
    }
}
