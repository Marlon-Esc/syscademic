<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Horario;
use App\Docente;
use App\Plantilla_docente;
use App\Planeacion_academica;
use App\Desglose_planeacion;
use PDF;
use DB;
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
                $total_materias= Horario::where('fk_plantilla',$id_plantilla->id)->distinct('clave_materia')->count('clave_materia');
                $total_grupos= Horario::where('fk_plantilla',$id_plantilla->id)->distinct('fk_grupo')->count('fk_grupo');
                foreach ($horarios as $horario) {
                    if ($horario->grupo->fk_planesc == 'CUA') {
                        $planeacion = Planeacion_academica::where('clave_materia',$horario->materia->clave)->where('fk_planesc',$horario->grupo->fk_planesc)->first();
                        $progreso= DB::select("select (SUM(CASE WHEN dp.aprendisaje_esperado IS NULL THEN 0 ELSE 1 END + CASE WHEN dp.actividad_aprendisaje IS NULL THEN 0 ELSE 1 END + CASE WHEN dp.evidencias_aprendido IS NULL THEN 0 ELSE 1 END)*100) / (select count(no_unidad) * 3 from temas where no_unidad != 0)  as progreso from desglose_planeaciones as dp where fk_planaca=". $planeacion->id." and fk_tema is not null");
                        $request->session()->push('user.mat_cua.nombre', $horario->materia->nombre);
                        $request->session()->push('user.mat_cua.clave', $horario->materia->clave);
                        $request->session()->push('user.mat_cua.mod', $horario->grupo->fk_planesc);
                        $request->session()->push('user.mat_cua.fk_grupo', $horario->fk_grupo);
                        $request->session()->push('user.mat_cua.progreso', number_format($progreso[0]->progreso, 2, '.', ''));

                    } else {
                        $planeacion = Planeacion_academica::where('clave_materia',$horario->materia->clave)->where('fk_planesc',$horario->grupo->fk_planesc)->first();
                        $progreso= DB::select("select (SUM(CASE WHEN dp.aprendisaje_esperado IS NULL THEN 0 ELSE 1 END + CASE WHEN dp.actividad_aprendisaje IS NULL THEN 0 ELSE 1 END + CASE WHEN dp.evidencias_aprendido IS NULL THEN 0 ELSE 1 END)*100) / (select count(no_unidad) * 3 from temas where no_unidad != 0)  as progreso from desglose_planeaciones as dp where fk_planaca=". $planeacion->id." and fk_tema is not null");
                        $request->session()->push('user.mat_sem.nombre', $horario->materia->nombre);
                        $request->session()->push('user.mat_sem.clave', $horario->materia->clave);
                        $request->session()->push('user.mat_sem.mod', $horario->grupo->fk_planesc);
                        $request->session()->push('user.mat_sem.fk_grupo', $horario->fk_grupo);
                        $request->session()->push('user.mat_sem.progreso', number_format($progreso[0]->progreso, 2, '.', ''));

                    }
                }
                


              return view('users.home',compact('horarios','total_materias','total_grupos'));
            } else {
                $request->session()->flush();
                return abort(404);
            }
            //$id_plantilla = Plantilla_docente::where('fk_docente',Auth::user()->fk_cuenta)->first(); //se busca el registro donde el docente se encuentre en la plantilla
           
      
        
      //return $id_plantilla->id;
    }
    public function generatePDF(Request $request,$mod,$clave)
    {
        // $data = ['title' => 'Welcome to HDTuto.com'];
        
        $planeacion = Planeacion_academica::where('clave_materia',$clave)->where('fk_planesc',$mod)->first();
        // $desg = Desglose_planeacion::where('fk_planaca',$planeacion->id)->get();
        $desg = DB::table('desglose_planeaciones')
                ->leftJoin('temas', 'desglose_planeaciones.fk_tema', '=', 'temas.id')
                ->where('fk_planaca',$planeacion->id)
                ->select('desglose_planeaciones.semana','desglose_planeaciones.fecha','desglose_planeaciones.horas','temas.unidad','temas.nom_tema','desglose_planeaciones.aprendisaje_esperado','desglose_planeaciones.actividad_aprendisaje','desglose_planeaciones.evidencias_aprendido','desglose_planeaciones.fk_tema')
                ->get();

        $concat_fech = DB::table('desglose_planeaciones')
                ->select('fk_tema as tm',DB::raw('group_concat(fecha) as fechas'))
                ->whereNotNull('fk_tema')
                 ->where('fk_planaca',$planeacion->id)
                ->groupBy('fk_tema')
                ->get();
        //return $concat_fech;
        if (count($desg) >0 ) {
            $pdf = PDF::loadView('users.unidades.pdf',compact('desg','concat_fech'));
            return $pdf->stream('planeacion_academica.pdf');
        } else {
            $result_error= '!Ups¡ Lo sentimos, aun no se ha planificado ningun tema';
            return back()->with(compact('result_error'));    
        }
    }
   
}
