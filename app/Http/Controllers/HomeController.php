<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Plan_escolar;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /*$visita = Auth::user()->visitas;
        
        if (Auth::user()->visitas == 1 ) {
            $id=Auth::user()->id;
            //User::find($id)->update(['visitas'=> '2']);
            $user = User::find ($id);
            $user->visitas = 2;
            $user->save();
            return view('configurations.index');
        } else {
            return view('users.home',compact('visita'));
        }
        */
        return view('users.home',compact('visita'));
    }
    public function prueba()
    {
        $var= Plan_escolar::all();
        return $var;
    }
}
