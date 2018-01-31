<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Waterkering extends Model
{
	public $fillable = array("status_deuren", "command", "onderhoud");

	public static $commands = array("close", "open", "onderhoud");
	public static $statuses = array("closed", "closing", "open", "opening", "unknown");
}