<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('position');
            $table->string('password');
            $table->integer('directory_id')->nullable();
//            $table->unsignedInteger('directory_id');
//            $table->foreign('directory_id')->references('directory_id')->on('directorates')->onUpdate('cascade')->onDelete('cascade');
            $table->string('directory_name')->nullable();
            $table->string('deputy_name')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
}
