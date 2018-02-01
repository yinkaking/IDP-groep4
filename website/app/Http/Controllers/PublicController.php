<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Waterdata;
use \App\Waterkering;

class PublicController extends Controller
{
    public function __construct(){}

    public function index()
    {
        // factory(\App\Waterdata::class, 30)->create();
        $view = view("public.index");
        $view->waters = Waterdata::orderBy("id", "DESC")->get()->take(20);
        return $view;
    }

    public function store(Request $req)
    {
        $data = $req->all();
        Waterdata::create(array(
            "hoog"=> $data["hoog"],
            "laag"=> $data["laag"]
        ));
        Waterkering::create(array(
            "status_deuren"=>$data["status_deuren"],
            "command"=>"none",
            "onderhoud"=>0
        ));

        return "success";
    }

    public function sendToPython(Request $req)
    {
        $command = Waterkering::where("command", "<>", "none")->where("command", "<>","onderhoud")->orderBy("id", "DESC")->first();
        $onderhoud = Waterkering::where("command", "onderhoud")->orderBy("id", "DESC")->first();

        $returnData = array(
            "command"=>$command->command,
            "onderhoud"=>$onderhoud->onderhoud
        );
        return json_encode($returnData);
    }
}