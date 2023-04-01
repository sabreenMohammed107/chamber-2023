<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChamberDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamber_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone', 1000)->nullable();
            $table->string('fax', 250)->nullable();
            $table->string('address', 1000)->nullable();
            $table->string('email', 250)->nullable();
            $table->string('map_url', 1000)->nullable();
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
        Schema::dropIfExists('chamber_datas');
    }
}
