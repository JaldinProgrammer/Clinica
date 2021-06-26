<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('details')->nullable();
            $table->integer('status')->default('0')->nullable();
            $table->time('time');
            $table->integer('virtualMeeting')->default('0')->nullable();
            $table->unsignedBigInteger('location_id')->nullable(); // if u wanna declarate a nullable fk u must to declare the fk by this way
            // $table->integer('virtualPayment')->default('0')->nullable();
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('service_id')->constrained('services');
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
        Schema::dropIfExists('reservations');
    }
}
