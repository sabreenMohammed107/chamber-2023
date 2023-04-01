<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_registers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',250)->nullable();
            $table->string('mobile',50)->nullable();
            $table->string('email',250)->nullable();
            $table->string('subject',250)->nullable();
            $table->string('messege',1000)->nullable();
            $table->integer('department_id')->unsigned()->nullable();
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
        Schema::dropIfExists('department_registers');
    }
}
