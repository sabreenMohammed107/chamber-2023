<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticleRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  This is Realations for the article_galleries Table ..
    Schema::table('article_galleries', function (Blueprint $table) {
        $table->foreign('article_id')->references('id')->on('chamber_articles');
       
        
    });

     //  This is Realations for the article_files Table ..
     Schema::table('article_files', function (Blueprint $table) {
        $table->foreign('article_id')->references('id')->on('chamber_articles');
       
    });

     //  This is Realations for the chamber_chances Table ..
     Schema::table('chamber_chances', function (Blueprint $table) {
        $table->foreign('chance_country_id')->references('id')->on('countries');
       
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
