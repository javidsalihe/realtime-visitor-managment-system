<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectoratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('directorates', function (Blueprint $table) {
                $table->increments('directorate_id');
                $table->string('directorate_name');
                $table->unsignedInteger('deputy_id');
                $table->foreign('deputy_id')->references('deputy_id')->on('deputies')->onUpdate('cascade')->onDelete('cascade');
                $table->timestamps();
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directorates');
    }
}
