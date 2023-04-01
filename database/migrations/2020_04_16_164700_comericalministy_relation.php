<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ComericalministyRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  This is Realations for the ministries Table ..
     Schema::table('ministries', function (Blueprint $table) {
        $table->foreign('ministry_type_id')->references('id')->on('ministry_types');
       
    });


     //  This is Realations for the commerical_topics Table ..
     Schema::table('commerical_topics', function (Blueprint $table) {
        $table->foreign('commerical_topic_id')->references('id')->on('commerical_topic_types');
       
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
