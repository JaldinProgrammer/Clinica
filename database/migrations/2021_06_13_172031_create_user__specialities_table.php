<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user__specialities', function (Blueprint $table) {
            $table->id();
            $table->Integer('status')->default('1');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('speciality_id')->constrained('specialities');
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
        Schema::dropIfExists('user__specialities');
    }
}
