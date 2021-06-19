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
            $table->foreignId('instrument_type_id')->constrained('instrument_types');
            $table->foreignId('attention_id')->constrained('attentions');
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
