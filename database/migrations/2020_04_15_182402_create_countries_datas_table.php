<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_name',250)->nullable();
            $table->string('en_name',250)->nullable();
            $table->string('flag',1000)->nullable();
            $table->integer('region_id')->unsigned()->nullable();
            $table->string('en_file',1000)->nullable();
            $table->string('ar_file',1000)->nullable();
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
        Schema::dropIfExists('countries_datas');
    }
}
