<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Waterdata;

class WaterdataController extends Controller
{
	public function index()
	{
		$view = view("admin.waterdata.index");
		$view->waterdatas = Waterdata::all();
		return $view;
	}
}