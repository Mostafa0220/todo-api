<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 256);
            $table->string('last_name', 256);
            $table->string('mobile', 15);
            $table->string('email', 64)->unique();
            $table->string('password', 64);
            $table->enum('gender', ['male', 'female']);
            $table->date('dob');
            $table->string('api_token', 128)->index();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
