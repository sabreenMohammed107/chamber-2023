<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChamberChancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamber_chances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chance_type')->nullable();
            $table->dateTime('chance_date', 6)->nullable();
            $table->string('ar_subject', 1000)->nullable();
            $table->string('en_subject', 1000)->nullable();
            $table->integer('chance_country_id')->unsigned()->nullable();
            $table->text('ar_field')->nullable();
            $table->text('en_field')->nullable();
            $table->text('ar_contact')->nullable();
            $table->text('en_contact')->nullable();
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('chamber_chances');
    }
}
