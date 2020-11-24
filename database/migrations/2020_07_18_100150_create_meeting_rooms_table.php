<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingRoomsTable extends Migration
{

    public function up()
    {
        Schema::create('meeting_rooms', function (Blueprint $table) {

            $table->increments('meeting_room_id');
            $table->string('name');
            $table->integer('capacity')->nullable();
            $table->string('building')->nullable();
            $table->string('floor')->nullable();
            $table->string('room_number')->nullable();
            $table->text('more_info')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meeting_rooms');
    }
}
