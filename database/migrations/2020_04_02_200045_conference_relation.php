<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConferenceRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  This is Realations for the conferences Table ..
        Schema::table('conferences', function (Blueprint $table) {
            $table->foreign('conference_type_id')->references('id')->on('conference_types');
           
        });
        //  This is Realations for the conference_galleries Table ..
        Schema::table('conference_galleries', function (Blueprint $table) {
            $table->foreign('conference_id')->references('id')->on('conferences');
           
        });
        //  This is Realations for the related_conferences Table ..
        Schema::table('related_conferences', function (Blueprint $table) {
            $table->foreign('conference_id')->references('id')->on('conferences');
            $table->foreign('related_conference_id')->references('id')->on('conferences');
           
        });
    
         //  This is Realations for the conference_files Table ..
         Schema::table('conference_files', function (Blueprint $table) {
            $table->foreign('conference_id')->references('id')->on('conferences');
           
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
