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
            $table->string('name', 32);
            $table->string('last_name', 32);
            $table->string('email', 256)->nullable();
            $table->string('phone', 32);
            $table->string('veh_make', 128)->nullable();
            $table->dateTime('appoitment');
            $table->string('description', 1024)->nullable();
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
