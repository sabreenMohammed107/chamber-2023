<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademyCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academy_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_name',1000)->nullable();
            $table->string('ar_name',1000)->nullable();
            $table->string('image',1000)->nullable();
            $table->text('ar_description')->nullable();
            $table->text('en_description')->nullable();
            $table->integer('course_hourse')->nullable();
            $table->integer('course_cost')->nullable();
            $table->longText('content')->nullable();
            $table->text('audience')->nullable();
            $table->integer('vip')->nullable();
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
        Schema::dropIfExists('academy_courses');
    }
}
