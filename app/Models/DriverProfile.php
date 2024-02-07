<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverProfile extends Model
{
    use HasFactory;
	protected $table = 'driver_profile';
	public $timestamps = false;
	
	protected $fillable = ["address","dob","license_number","expiration_date","owner_name","owner_address","year","make","license_plate_no","registration_express","seating_capacity","no_seatbelts","insurance_information","policy_number","tel_no","insurance_expiration_date","liability_limits_policy"];
}
