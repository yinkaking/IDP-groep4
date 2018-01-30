<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Waterdata extends Model
{
    public $fillable = array("hoog", "laag");

	public function getCreatedAtAttribute($date)
	{
	    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y G:i');
	}
}