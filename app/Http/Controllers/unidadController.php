<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\Docente;
use App\Tema;
use App\Materia;
use App\Planeacion_academica;
use App\Desglose_planeacion;
use Carbon\Carbon;
use App\Ciclo_escolar;
use App\Dias_de_asueto;

class unidadController extends Controller
{

    public function index(Request $request, $mod,$id){
       if (Auth::user()) {
            $id_docent = Docente::find(Auth::user()->fk_cuenta)->id;
            $plan_academic= Planeacion_academica::where('clave_materia',$id)->where('fk_planesc',$mod)->first();
            
           if (!$plan_academic) {
                 $planeacion = new Planeacion_academica;
                 $planeacion->clave_materia = $id;
                 $planeacion->fk_docente =  $id_docent;
                 $planeacion->fk_planesc =  $mod;
                 $planeacion->save();
                 //return 'no hay resultados, pero ya se agregaron';
             }
            $request->session()->forget('unidad');
            $materia = Materia::where('clave',$id)->get();
            $total_temas = Tema::where('clave_materia',$id)->max('no_unidad'); //total te unidades
            for ($i=1; $i <= $total_temas ; $i++) {
                $nombre = Tema::where('unidad',$i)->get();
                foreach ($nombre as $nomb) {
                    $request->session()->push('unidad', $nomb->nom_tema);
                }
            }
            //return $materia;
            return view('components.unidad',compact('total_temas','materia','id','mod'));
        } else {
            return abort(404);
        }
         
        
    }

    public function unidad($mod,$id, $no_unidad)
    {

    	$subtemas= Tema::where('no_unidad',$no_unidad)->get();
        $plan_academic= Planeacion_academica::where('clave_materia',$id)->where('fk_planesc',$mod)->first();
        //return $plan_academic->id;
    	return view('users.unidades.planificacion',compact('subtemas','plan_academic','mod'));

    }
    public function store(Request $request, $fk_planacademic)
    {
         /*$rules = array(
             'tema' => 'required',
            'semana' => 'required',
            'dia' => 'required',
            'horas' => 'required',
            'ae' => 'required',
            'aa' => 'required',
            'ea' => 'required',
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails())
         return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        */
       //return $request;
       $desg_plan= new Desglose_planeacion;
       $desg_plan->semana = $request->semana;
       $desg_plan->fecha = date("Y/m/d",strtotime($request->dia));
       $desg_plan->horas = $request->horas;
       $desg_plan->fk_tema= $request-> tema;
       $desg_plan->fk_planaca= $fk_planacademic;
       $desg_plan->aprendisaje_esperado = $request->ae;
       $desg_plan->actividad_aprendisaje = $request->aa;
       $desg_plan->evidencias_aprendido = $request->ea;
       $desg_plan->save();
       return back()->with('success','Se agrego exitosamente tu clase planifica');
       
    }
    public function fecha(Request $request, $mod)
    {
        $ciclo_actual= Ciclo_escolar::where('fk_planesc',$mod)->where('edo',1)->first();//obtiene ciclo vigente
        if (count($ciclo_actual->clases) == 0) {
            return 'No hay fechas de inicio y fin de clases agregadas';
        } else{ 

            /*
                Obtener la fecha de los examenes y descontarlo en los dias
             
            list($fechaInicio, $fechaFin) = explode('-', $request->range);
            $fech1 = strtotime(str_replace('/', '-', $fechaInicio));
            $fech2 = strtotime(str_replace('/', '-', $fechaFin));

            */
            $fech1 = strtotime($ciclo_actual->clases[0]->inicio);
            $fech2 = strtotime($ciclo_actual->clases[0]->fin);
            $l=0; $m=0; $mi=0; $j=0; $v=0;
             for($i=$fech1; $i<=$fech2; $i+=86400){
                 $td = Carbon::parse(date("d-m-Y", $i));
                 /*if ($td->dayOfWeekIso == 1) {
                     printf("Lunes: %s <br>", date("d-m-Y", $i));
                 }*/
                 switch ($td->dayOfWeekIso) {
                     case 1:
                         $l++;
                         break;
                     case 2:
                         $m++;
                         break;
                     case 3:
                         $mi++;
                         break;
                    case 4:
                         $j++;
                         break;
                    case 5:
                         $v++;
                         break;
                 }

            }
            /*printf("Total_lunes: %s <br>",$l);
            printf("Total_martes: %s <br>",$m);
            printf("Total_miercoles: %s <br>",$mi );
            printf("Total_jueves: %s <br>",$j );
            printf("Total_viernes: %s <br>",$v );*/

            printf("Total_dias_habiles: %s <br>",$day= $l+$m+$mi+$j+$v );

            /*$fechaInicio= strtotime("22-01-2018");
            $fechaFin=strtotime("31-05-2018");
            $fechin= date("Y-m-d",$fech1);
            $dt = Carbon::parse();
            echo $dt->dayOfWeekIso;
            return $request->range;
            printf("fech: %s", Carbon::parse($fechin));
            return view('users.unidades.fechas');*/           
            
        }
        
        
    }
}
