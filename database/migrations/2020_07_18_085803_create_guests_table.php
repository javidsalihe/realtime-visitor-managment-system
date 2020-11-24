<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{

    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {

            $table->increments('guest_id');
            $table->string('guest_name');
            $table->string('guest_email')->nullable();
            $table->string('guest_phone')->nullable();
            $table->string('guest_position')->nullable();
            $table->string('guest_type')->nullable();
            $table->string('visit_date')->nullable();
            $table->string('visit_time')->nullable();
            $table->text('visit_purpose')->nullable();
            $table->string('vehicle_info')->nullable();
            $table->string('door')->nullable();
            $table->string('status')->nullable();
            $table->string('time_in')->nullable();
            $table->unsignedInteger('organization_id');
            $table->foreign('organization_id')->references('organization_id')->on('organizations')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('id');
            $table->foreign('id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
