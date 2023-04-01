<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademyDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academy_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mangment_phone', 250)->nullable();
            $table->string('marketing_phone', 250)->nullable();
            $table->string('whatsapp', 250)->nullable();
            $table->string('email', 250)->nullable();
           
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
        Schema::dropIfExists('academy_datas');
    }
}
