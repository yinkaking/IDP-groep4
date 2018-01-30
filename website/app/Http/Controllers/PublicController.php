<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct(){}

    public function index()
    {
        // factory(\App\Waterdata::class, 30)->create();
        $view = view("public.index");
        $view->waters = \App\Waterdata::all();
        return $view;
    }

    public function store(Request $req)
    {
        $data = $req->all();
        \App\Waterdata::create(array(
            "hoog"=> $data["hoog"],
            "laag"=> $data["laag"]
        ));
        return Redirect::namedRoute("public.index");
    }
}