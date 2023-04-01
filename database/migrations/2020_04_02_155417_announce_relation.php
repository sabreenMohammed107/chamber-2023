<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnnounceRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //  This is Realations for the announce_galleries Table ..
       Schema::table('announce_galleries', function (Blueprint $table) {
        $table->foreign('announce_id')->references('id')->on('announcements');
       
    });
    //  This is Realations for the related_announces Table ..
    Schema::table('related_announces', function (Blueprint $table) {
        $table->foreign('announce_id')->references('id')->on('announcements');
        $table->foreign('related_announce_id')->references('id')->on('announcements');
       
    });

     //  This is Realations for the announce_files Table ..
     Schema::table('announce_files', function (Blueprint $table) {
        $table->foreign('announce_id')->references('id')->on('announcements');
       
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
