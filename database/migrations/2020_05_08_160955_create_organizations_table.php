<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{

    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('organization_id');
            $table->string('organization_name')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('organizations');
    }
}
