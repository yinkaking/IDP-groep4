<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $view = view('admin.user.index');
        $view->users = User::all();
        return $view;
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $req)
    { 
        $data = $req->all();
        if($data["password"] != $data["repeat_password"]){
            return back()->with("error", "De wachtwoorden zijn niet hetzelfde");
        }

        $data["password"] = Hash::make($data["password"]);
        User::create($data);
        return redirect()->route("user.index")->with("message", "Succesvol gebruiker aangemaakt");
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route("user.index")->with("message", "Succesvol gebruiker verwijderd");
    }
}
