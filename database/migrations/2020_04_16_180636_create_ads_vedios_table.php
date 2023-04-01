<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsVediosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_vedios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_title', 1000)->nullable();
            $table->string('en_title', 1000)->nullable();
            $table->string('ar_subtitle', 1000)->nullable();
            $table->string('en_subtitle', 1000)->nullable();
            $table->string('vedio_url', 1000)->nullable();
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
        Schema::dropIfExists('ads_vedios');
    }
}
