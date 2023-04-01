<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainedCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trained_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_name',250)->nullable();
            $table->string('en_name',250)->nullable();
            $table->integer('year_from')->nullable();
            $table->integer('year_to')->nullable();
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
        Schema::dropIfExists('trained_companies');
    }
}
