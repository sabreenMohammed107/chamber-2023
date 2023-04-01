<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_title',1000)->nullable();
            $table->string('en_title',1000)->nullable();
            $table->dateTime('announce_date',6)->nullable();
            $table->text('ar_text')->nullable();
            $table->text('en_text')->nullable();
            $table->integer('searchType')->nullable();
            $table->integer('home_order')->nullable();
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
        Schema::dropIfExists('announcements');
    }
}
