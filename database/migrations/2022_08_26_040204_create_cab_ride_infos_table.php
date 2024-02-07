<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabRideInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cab_ride_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('driver_id');
            $table->string('journey_type');
			$table->string('price');
			$table->string('pickup_location');
			$table->string('drop_location');
			$table->string('journey_date');
			$table->string('pickup_time');
			$table->string('drop_time');
			$table->string('return_pickup_location');
			$table->string('return_drop_location');
			$table->string('return_journey_date');
			$table->string('return_pickup_time');
			$table->string('return_drop_time');
			$table->string('time_difference');
			$table->string('luggage');
			$table->string('return_luggage');
			$table->string('car_make');
			$table->string('registration_number');
			$table->string('car_type');
			$table->string('car_seat');
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
        Schema::dropIfExists('cab_ride_infos');
    }
}
