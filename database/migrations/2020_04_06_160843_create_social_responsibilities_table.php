<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialResponsibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_responsibilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_title',1000)->nullable();
            $table->string('ar_title',1000)->nullable();
            $table->text('en_text',1000)->nullable();
            $table->text('ar_text',1000)->nullable();
            $table->string('image',1000)->nullable();
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
        Schema::dropIfExists('social_responsibilities');
    }
}
