<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItinarariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinararies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('transport_id')->nullable();
            $table->string('pickup_or_dropoff_or_marshrut');
            $table->date('pickup_or_dropoff_date');
            $table->time('pickup_or_dropoff_time');
            $table->string('pickup_or_dropoff_from');
            $table->string('pickup_or_dropoff_to');
            $table->string('driver_name');
            $table->string('driver_tel');
            $table->string('train_class');
            $table->string('train_name');
            $table->string('plane_class');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itinararies');
    }
}
