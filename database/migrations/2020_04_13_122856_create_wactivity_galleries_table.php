<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWactivityGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wactivity_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image', 1000)->nullable();
            $table->string('vedio', 1000)->nullable();
            $table->integer('order')->nullable();
            $table->integer('activity_id')->unsigned()->nullable();
            $table->integer('active')->nullable();
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
        Schema::dropIfExists('wactivity_galleries');
    }
}
