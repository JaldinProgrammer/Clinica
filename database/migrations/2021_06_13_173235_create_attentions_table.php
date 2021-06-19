<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attentions', function (Blueprint $table) {
            $table->id();
            $table->time('checkIn')->nullable();
            $table->time('checkOut')->nullable();
            $table->string('qrPayment')->nullable();
            $table->float('totalPrice')->nullable();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('nurse_id');
            $table->unsignedBigInteger('schedule_id')->nullable();
            $table->unsignedBigInteger('service_id');
            $table->foreign('patient_id')->references('id')->on('users');
            $table->foreign('nurse_id')->references('id')->on('users');
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreign('service_id')->references('id')->on('services');
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
        Schema::dropIfExists('attentions');
    }
}
