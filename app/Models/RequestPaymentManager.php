<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestPaymentManager extends Model
{
    use HasFactory;
	protected $table = 'payment_info_event_new';
	public $timestamps = true;
	
	protected $fillable = ["user_id","event_id","order_event_id","status"];
}
