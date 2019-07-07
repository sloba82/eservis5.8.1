<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppoitmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoitments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('veh_make')->nullable();
            $table->dateTime('appoitment');
            $table->string('description', 512)->nullable();
            $table->string('comment_admin');
            $table->integer('active')->nullable();
            $table->integer('confirm')->nullable();
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
        Schema::dropIfExists('appoitments');
    }
}
