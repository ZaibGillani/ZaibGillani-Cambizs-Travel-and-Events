<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DriverProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('driver_profile', function (Blueprint $table) {
            $table->id();
			$table->integer("driver_id");
            $table->string('address');
            $table->string('dob');
            $table->string('license_number');
            $table->string('expiration_date');
            $table->string('owner_name');
            $table->string('owner_address');
            $table->string('year');
            $table->string('make');
            $table->string('license_plate_no');
            $table->string('registration_express');
            $table->string('seating_capacity');
            $table->string('no_seatbelts');
            $table->string('insurance_information');
            $table->string('policy_number');
            $table->string('tel_no');
            $table->string('insurance_expiration_date');
            $table->string('liability_limits_policy');
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
