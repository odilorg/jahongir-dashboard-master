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
            $table->unsignedBigInteger('transport_id');
            $table->json('pickup_or_dropoff_or_marshrut');
            $table->json('pickup_or_dropoff_date_time');
            $table->foreign('transport_id')->references('id')->on('transports')->cascadeOnDelete();
            $table->json('pickup_or_dropoff_from');
            $table->json('pickup_or_dropoff_to');
            $table->json('driver_name')->nullable();
            $table->json('driver_tel')->nullable();
             $table->string('extra_info')->nullable();
            // $table->string('train_name')->nullable();
            // $table->string('plane_class')->nullable();

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
