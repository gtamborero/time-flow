<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_seller');
            $table->bigInteger('id_buyer');
            $table->bigInteger('id_creator');
            $table->integer('status');
            $table->string('concept')->nullable();
            $table->timestamp('accepted_time');
            $table->timestamp('finished_time');
            $table->timestamp('cancelled_time');
            $table->integer('amount');
            //$table->foreign('id_seller')->references('id')->on('users');
            //$table->foreign('id_buyer')->references('id')->on('users');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchanges');
    }
}
