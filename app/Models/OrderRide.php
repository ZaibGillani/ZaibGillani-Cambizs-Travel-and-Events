<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRide extends Model
{
    protected $table = 'order_ride';
	public $timestamps = true;
	
	protected $fillable = ["name","email","booking_seat","booking_date","driver_id","ride_id"];
}
