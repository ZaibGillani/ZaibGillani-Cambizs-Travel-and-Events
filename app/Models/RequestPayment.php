<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestPayment extends Model
{
    use HasFactory;
	protected $table = 'payment_info';
	public $timestamps = true;
	
	protected $fillable = ["user_id","ride_id","order_id","status"];
}
