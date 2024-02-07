<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetails extends Model
{
    use HasFactory;
	protected $table = 'user_bank_details';
	public $timestamps = false;
	
	protected $fillable = ["user_id","name","address","routing_number","email","city","account_number","state","zip"];
}
