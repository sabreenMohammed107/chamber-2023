<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path',1000)->nullable();
            $table->string('name',1000)->nullable();
            $table->integer('language_id')->nullable();
            $table->integer('section_id')->unsigned()->nullable();
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
        Schema::dropIfExists('section_files');
    }
}
