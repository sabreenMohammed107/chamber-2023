<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExporterRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //  This is Realations for the exporter_encyclopedias Table ..
     Schema::table('exporter_encyclopedias', function (Blueprint $table) {
        $table->foreign('exporter_type_id')->references('id')->on('exporter_types');
       
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
