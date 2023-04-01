<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_name',1000)->nullable();
            $table->string('ar_name',1000)->nullable();
            $table->string('en_position',1000)->nullable();
            $table->string('ar_position',1000)->nullable();
            $table->string('image',1000)->nullable();
            $table->integer('board_directors_id')->unsigned()->nullable();
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
        Schema::dropIfExists('board_members');
    }
}
