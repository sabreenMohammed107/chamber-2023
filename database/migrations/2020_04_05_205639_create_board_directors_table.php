<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardDirectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_directors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('manager_en_name',1000)->nullable();
            $table->string('manager_ar_name',1000)->nullable();
            $table->dateTime('from_date',6)->nullable();
            $table->dateTime('to_date',6)->nullable();
            $table->integer('current')->nullable();

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
        Schema::dropIfExists('board_directors');
    }
}
