<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncycloRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //  This is Realations for the business_organizations Table ..
    Schema::table('business_organizations', function (Blueprint $table) {
        $table->foreign('bussiness_type_id')->references('id')->on('business_types');
       
    });

     //  This is Realations for the decision_lows Table ..
     Schema::table('decision_lows', function (Blueprint $table) {
        $table->foreign('low_type_id')->references('id')->on('lows_types');
       
    });

    //  This is Realations for the embassies_consulates Table ..
    Schema::table('embassies_consulates', function (Blueprint $table) {
        $table->foreign('embassies_type_id')->references('id')->on('embassies_types');
       
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
