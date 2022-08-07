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
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id');

            $table->string('usuario')->unique();
            $table->string('password');
            $table->boolean('condicion')->default(1);

            $table->unsignedBigInteger('idrol');
            $table->rememberToken();

            $table->foreign('id')->references('id')->on('personas')->onDelete('cascade');
            $table->foreign('idrol')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
