<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class view_ride extends Model
{
    use HasFactory;
	protected $table = 'cab_ride_infos';
	public $timestamps = false;
}
