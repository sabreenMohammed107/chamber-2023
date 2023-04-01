<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChamberAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamber_ads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ads_no')->nullable();
            $table->string('image',1000)->nullable();
            $table->string('url',1000)->nullable();
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
        Schema::dropIfExists('chamber_ads');
    }
}
