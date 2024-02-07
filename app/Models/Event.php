<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
	
	protected $table = 'events_table';
	public $timestamps = true;
	
	protected $fillable = ["category_name","user_id","event_type","event_time","event_title","keynote","about_event","event_image","event_location","guest_name","ticket_details"];
}
