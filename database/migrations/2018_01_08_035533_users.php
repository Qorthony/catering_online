<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
          $table->increments('id');
          $table->unsignedInteger('role_id');
          $table->string('username',30)->unique();
          $table->string('email',30)->unique();
          $table->string('nama',50);
          $table->string('password',255);
          $table->rememberToken();
          $table->timestamps();
        });


        Schema::create('roles', function (Blueprint $kolom)
        {
          $kolom->increments('id');
          $kolom->string('nama_role');
        });

        Schema::table('users', function (Blueprint $kolom)
        {
          $kolom->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('users');
      Schema::drop('roles');
    }
}
