<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecisionLowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decision_lows', function (Blueprint $table) {
            $table->increments('id');
            $table->text('ar_text')->nullable();
            $table->text('en_text')->nullable();
            $table->string('en_file',1000)->nullable();
            $table->string('ar_file',1000)->nullable();
            $table->integer('low_type_id')->unsigned()->nullable();
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
        Schema::dropIfExists('decision_lows');
    }
}
