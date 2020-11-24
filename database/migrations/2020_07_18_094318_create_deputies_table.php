<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeputiesTable extends Migration
{

    public function up()
    {
        Schema::create('deputies', function (Blueprint $table) {
            $table->increments('deputy_id');
            $table->string('deputy_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('deputies');
    }
}
