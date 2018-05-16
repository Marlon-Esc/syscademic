<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Horario;
use App\Docente;
use App\Plantilla_docente;
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
            //$id_docent = Docente::find(Auth::user()->fk_cuenta)->id;
            if ($id_plantilla = Plantilla_docente::where('fk_docente',Auth::user()->fk_cuenta)->first()) {
                 session(['user_name' => $name]);
                $horarios = Horario::where('fk_plantilla',$id_plantilla->id)->get(); //es necesario el where para acceder a los modelos
                foreach ($horarios as $horario) {
                    if ($horario->grupo->fk_planesc == 'CUA') {
                        $request->session()->push('user.mat_cua.nombre', $horario->materia->nombre);
                        $request->session()->push('user.mat_cua.clave', $horario->materia->clave);
                        $request->session()->push('user.mat_cua.mod', $horario->grupo->fk_planesc);
                    } else {
                        $request->session()->push('user.mat_sem.nombre', $horario->materia->nombre);
                        $request->session()->push('user.mat_sem.clave', $horario->materia->clave);
                        $request->session()->push('user.mat_sem.mod', $horario->grupo->fk_planesc);
                    }
                }
              return view('users.home',compact('horarios'));
            } else {
                $request->session()->flush();
                return abort(404);
            }
            //$id_plantilla = Plantilla_docente::where('fk_docente',Auth::user()->fk_cuenta)->first(); //se busca el registro donde el docente se encuentre en la plantilla
           
      
        
      //return $id_plantilla->id;
    }
   
}
