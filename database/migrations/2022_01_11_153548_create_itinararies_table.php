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
            $table->json('pickup_or_dropoff_or_marshrut');
            $table->json('pickup_or_dropoff_date_time');
           
            $table->json('pickup_or_dropoff_from');
            $table->json('pickup_or_dropoff_to');
            $table->json('driver_name');
            $table->json('driver_tel');
            $table->string('train_class')->nullable();
            $table->string('train_name')->nullable();
            $table->string('plane_class')->nullable();

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
