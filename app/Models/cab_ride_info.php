<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cab_ride_info extends Model
{
    use HasFactory;
	protected $table = 'cab_ride_infos';
	public $timestamps = false;
	
	protected $fillable = ["journey_type","price","pickup_location","drop_location","journey_date","pickup_time","drop_time","luggage","car_make","registration_number","car_type","car_seat"];
}
