<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        Self::isAuthorized();
        return view('admin.user.create');
    }

    public function store(Request $req)
    { 
        Self::isAuthorized();
        $data = $req->all();
        if($data["password"] != $data["repeat_password"]){
            return back()->with("error", "De wachtwoorden zijn niet hetzelfde");
        }

        $data["password"] = Hash::make($data["password"]);
        $data["isAdmin"] = false;
        User::create($data);
        return redirect()->route("user.index")->with("message", "Succesvol gebruiker aangemaakt");
    }

    public function destroy($id)
    {
        Self::isAuthorized();
        $user = User::find($id);
        $user->delete();
        return redirect()->route("user.index")->with("message", "Succesvol gebruiker verwijderd");
    }
    public static function isAuthorized()
    {
        if(!Auth::user()->isAdmin){
            return Redirect::namedRoute("home");
        }
    }
}
