<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Waterdata;

class ControleController extends Controller
{
	public function index()
	{
		$view = view("admin.control.index");
		return $view;
	}

	public function updateWaterkering(Request $req){
		return serialize($req->all());
	}
}