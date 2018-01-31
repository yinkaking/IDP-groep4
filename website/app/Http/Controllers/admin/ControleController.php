<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Waterdata;
use App\Waterkering;

class ControleController extends Controller
{
	public function index()
	{
		$view = view("admin.control.index");
		$view->onderhoud = Waterkering::orderBy("id", "DESC")->first()->onderhoud;
		return $view;
	}

	public function updateWaterkering(Request $req)
	{
		Waterkering::create(array(
			"command"=> $req->get("command"),
			"status_deuren"=>"unknown",
			"onderhoud"=>0
		));
		return "success";
	}

	public function getStatusDoors(Request $req)
	{
		$status = Waterkering::where("status_deuren", "<>", "unknown")->orderBy("id", "DESC")->first();
		if ($status == null) {
			return "Onbekend";
		}
		return $status->status_deuren;
	}

	public function onderhoud(Request $req)
	{
		Waterkering::create(array(
			"command"=> "none",
			"status_deuren"=>"unknown",
			"onderhoud"=>$req->get("onderhoud")
		));
		return redirect()->route("control.index");
	}
}