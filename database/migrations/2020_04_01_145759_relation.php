<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       //  This is Realations for the news_galleries Table ..
       Schema::table('news_galleries', function (Blueprint $table) {
        $table->foreign('news_id')->references('id')->on('news');
       
    });
    //  This is Realations for the related_news Table ..
    Schema::table('related_news', function (Blueprint $table) {
        $table->foreign('news_id')->references('id')->on('news');
        $table->foreign('related_news_id')->references('id')->on('news');
       
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
