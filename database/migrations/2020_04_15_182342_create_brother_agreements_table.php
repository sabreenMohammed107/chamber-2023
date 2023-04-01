<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrotherAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brother_agreements', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('agreement_date',6)->nullable();
            $table->string('ar_issuer',250)->nullable();
            $table->string('en_issuer',250)->nullable();
            $table->text('ar_agreement')->nullable();
            $table->text('en_agreement')->nullable();
            $table->string('en_file',1000)->nullable();
            $table->string('ar_file',1000)->nullable();
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
        Schema::dropIfExists('brother_agreements');
    }
}
