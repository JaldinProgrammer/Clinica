<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttentionInstrumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attention_instruments', function (Blueprint $table) {
            $table->id();
            $table->integer('amount')->default('0');
            $table->foreignId('attention_id')->constrained('attentions');
            $table->foreignId('instrument_id')->constrained('instruments');
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
        Schema::dropIfExists('attention_instruments');
    }
}
