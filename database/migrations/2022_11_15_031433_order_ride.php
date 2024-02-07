<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderRide extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('order_ride', function (Blueprint $table) {
            $table->id();
			$table->integer("driver_id");
			$table->integer("ride_id");
            $table->string('name');
            $table->string('email');
            $table->string('booking_seat');
            $table->string('booking_date');
            $table->string('booking_price');
            $table->rememberToken();
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
        //
    }
}
