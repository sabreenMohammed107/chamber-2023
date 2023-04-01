<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WomanRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
    //  This is Realations for the wactivity_galleries Table ..
    Schema::table('wactivity_galleries', function (Blueprint $table) {
        $table->foreign('activity_id')->references('id')->on('woman_activities');
       
    });
    //  This is Realations for the related_wactivities Table ..
    Schema::table('related_wactivities', function (Blueprint $table) {
        $table->foreign('activity_id')->references('id')->on('woman_activities');
        $table->foreign('related_activity_id')->references('id')->on('woman_activities');
       
    });

     //  This is Realations for the wactivity_files Table ..
     Schema::table('wactivity_files', function (Blueprint $table) {
        $table->foreign('activity_id')->references('id')->on('woman_activities');
       
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
