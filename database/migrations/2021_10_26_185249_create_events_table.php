<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_table', function (Blueprint $table) {
            $table->id();
			$table->integer("user_id");
			$table->string("category_name");
			$table->string("event_type");
			$table->dateTime("event_time");
			$table->string("event_title");
			$table->string("keynote");
			$table->string("about_event");
			$table->string("event_image");
			$table->string("event_location");
			$table->string("guest_name");
			$table->string("ticket_details");
			$table->string("status");
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
        Schema::dropIfExists('events');
    }
}
