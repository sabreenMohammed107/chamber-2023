<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommericalTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commerical_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->text('ar_text')->nullable();
            $table->text('en_text')->nullable();
            $table->string('en_file', 1000)->nullable();
            $table->string('ar_file', 1000)->nullable();
            $table->integer('active')->nullable();
            $table->integer('commerical_topic_id')->unsigned()->nullable();
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
        Schema::dropIfExists('commerical_topics');
    }
}
