<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Horario;
use App\Docente;
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
    public function index(Request $request)
    {   
        $request->session()->forget('user');
        $name = Auth::user()->name;
        $id_docent = Docente::find(Auth::user()->fk_cuenta)->id;
        session(['user_name' => $name]);
        $horarios = Horario::where('fk_docente',$id_docent)->get(); //es necesario el where para acceder a los modelos
        foreach ($horarios as $horario) {
            if ($horario->grupo->fk_planesc == 'CUA') {
                $request->session()->push('user.mat_cua', $horario->materia->nombre);
            } else {
                $request->session()->push('user.mat_sem', $horario->materia->nombre);
            }
        }
       return view('users.home',compact('horarios'));
    }
   
}
