<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_name',250)->nullable();
            $table->string('en_name',250)->nullable();
            $table->string('phone',250)->nullable();
            $table->string('email',250)->nullable();
            $table->string('website',250)->nullable();
            $table->string('en_address',1000)->nullable();
            $table->string('ar_address',1000)->nullable();
            $table->integer('bussiness_type_id')->unsigned()->nullable();
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
        Schema::dropIfExists('business_organizations');
    }
}
