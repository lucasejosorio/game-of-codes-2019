<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transport_id');
            $table->unsignedBigInteger('venue_start_id');
            $table->unsignedBigInteger('venue_destination_id');
            $table->dateTime('date');
            $table->timestamps();

            $table->foreign('transport_id')
                ->references('id')
                ->on('transports');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rides');
    }
}
