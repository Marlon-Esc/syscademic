<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use Validator;
use Response;
use Carbon\Carbon;

use App\Docente;
use App\Horario;
use App\Plantilla_docente;
use App\Tema;
use App\Materia;
use App\Planeacion_academica;
use App\Desglose_planeacion;
use App\Parcial;
use App\Ciclo_escolar;
use App\Dias_de_asueto;

class unidadController extends Controller
{

    public function index(Request $request, $mod,$id, $fk){
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
            return view('components.unidad',compact('total_temas','materia','id','mod','fk'));
        } else {
            return abort(404);
        }
         
        
    }

    public function unidad($mod,$id, $no_unidad)
    {

    	$subtemas= Tema::where('no_unidad',$no_unidad)->get();
        $plan_academic= Planeacion_academica::where('clave_materia',$id)->where('fk_planesc',$mod)->first();
        //return $plan_academic->id;
    	return view('users.unidades.planificacion',compact('subtemas','plan_academic','mod','id'));

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
    public function fecha(Request $request, $mod, $clave, $fk)
    {
        $request->session()->forget('reparto');
        $id_plantilla = Plantilla_docente::where('fk_docente',Auth::user()->fk_cuenta)->first();
        $horarios = Horario::where('fk_plantilla',$id_plantilla->id)->where('clave_materia',$clave)->where('fk_grupo',$fk)->first();

        $horas_x_semana= $horarios->desglose_horario->sum('hrs_totales'); //horas a la semana de clases
        $ciclo_actual= Ciclo_escolar::where('fk_planesc',$mod)->where('edo',1)->first();//obtiene ciclo vigente
        $temas= Tema::where('clave_materia',$clave)->where('no_unidad','!=',0)->get();
        $total_temas= count($temas);// total de temas
        $parciales = $ciclo_actual->parcial->where('clave_materia',$clave)->first();
        if (count($ciclo_actual->clases) == 0) {
            return 'No hay fechas de inicio y fin de clases agregadas';
        } else{ 
            /*
            list($fechaInicio, $fechaFin) = explode('-', $request->range);
            $fech1 = strtotime(str_replace('/', '-', $fechaInicio));
            $fech2 = strtotime(str_replace('/', '-', $fechaFin));
            */
            $fech1 = strtotime($ciclo_actual->clases[0]->inicio);
            $fech2 = strtotime($ciclo_actual->clases[0]->fin);
            $asuetos = $this->getHolidays(1,$ciclo_actual,$horarios); 
            //return $asuetos;
            $long_array= count($asuetos); // 7
            $ciclo_dias_habiles= $this->getBusinessDays($fech1,$fech2);
            $dias_sin_asuet = ($ciclo_dias_habiles - $this->getHolidays(2,$ciclo_actual,$horarios)) - 2; //dias de asueto y 2 de examenes
            //return $dias_sin_asuet;
            $semanas_ciclo= $dias_sin_asuet / 5; // total de semanas en el ciclo
            //return $semanas_ciclo;
            
            $horas_clases= $horas_x_semana * $semanas_ciclo;// total de horas de clases
            
            $dif= $horas_clases - $total_temas; // 4
            $uni=0; $cont=0; $loop=0;
            $temas_x_hora = ($total_temas < $horas_clases) ? round( $total_temas / $horas_clases) : floor( $total_temas / $horas_clases ) ;// 2
            $residuo_temas = $total_temas % $horas_clases; // 7 
            
            $active=0; $dias=0; $total=0; $sem=0;

            for($i=$fech1; $i<=$fech2; $i+=86400){
                 $td = Carbon::parse(date("Y-m-d", $i));
                 switch ($td->toDateString()) {
                     case $asuetos[$cont]:
                           // printf("%s <br>",$this->getNumberday(Carbon::parse(date("Y-m-d", $i))));
                             //$request->session()->push('reparto',date("Y/m/d", $i).'-DIA DE ASUETO');
                             ($long_array == $cont) ? $cont=0 : $cont++ ;
                             ($long_array == $cont) ? $cont=0 : '' ;
                             break;
                     case $parciales->p1:
                            // $request->session()->push('reparto',date("Y/m/d", $i).'-EXAMEN PRIMER PARCIAL');
                             break;
                     case $parciales->p2:
                            // $request->session()->push('reparto',date("Y/m/d", $i).'-EXAMEN SEGUNDO PARCIAL');
                             break;
                     case $parciales->pf:
                           // $request->session()->push('reparto',date("Y/m/d", $i).'-EXAMEN TERCER PARCIAL');
                             break;
                     default:
                            //return $this->getDayclass($td->toDateString(),$horarios->desglose_horario);
                            foreach ($horarios->desglose_horario as $horario) //obtiene los dias de clases
                             {
                                
                                if ($horario->dia == $td->dayOfWeekIso ) { //verifica el dia de clases
                                    $total += $horario->hrs_totales;
                                    
                                   if ($total_temas == $horas_clases) {
                                       $request->session()->push('reparto',date("Y/m/d", $i).'-'.$temas[$uni]->unidad.'-'.$temas[$uni]->nom_tema);
                                       $uni++;
                                    } elseif ($total_temas < $horas_clases) {
                                        $resi= $horas_clases % $total_temas;
                                        
                                        //$proporcion = round($temas_x_sem + $tem_dif);
                                        
                                        if ($loop < $resi) {
                                            
                                            if ($horario->hrs_totales > 1) {
                                                $sum=1;
                                                while ($sum <= $horario->hrs_totales) {
                                                     if ($active == 0) {
                                                      $request->session()->push('reparto',date("Y/m/d", $i).'-'.$temas[$uni]->unidad.'-'.$temas[$uni]->nom_tema);
                                                      $active=1;
                                                      $sum++;   
                                                     } else {
                                                        $request->session()->push('reparto',date("Y/m/d", $i).'-'.$temas[$uni]->unidad.'-'.$temas[$uni]->nom_tema);
                                                        ($total_temas == $uni) ? $uni=0 : $uni++;
                                                        $active=0;
                                                        $sum++; $loop++;
                                                     }
                                                }
                                             
                                               } else{
                                                    if ($active == 0) {
                                                      $request->session()->push('reparto',date("Y/m/d", $i).'-'.$temas[$uni]->unidad.'-'.$temas[$uni]->nom_tema);
                                                      $active=1;   
                                                    } else {
                                                       $request->session()->push('reparto',date("Y/m/d", $i).'-'.$temas[$uni]->unidad.'-'.$temas[$uni]->nom_tema); 
                                                       ($total_temas == $uni) ? '' : $uni++;
                                                       $loop++; $active=0;
                                                    }
                                               }  
                                        } else{
                                            if ($horario->hrs_totales > 1) {
                                                $sum=1;
                                                while ($sum <= $horario->hrs_totales) {
                                                    $request->session()->push('reparto',date("Y/m/d", $i).'-'.$temas[$uni]->unidad.'-'.$temas[$uni]->nom_tema);
                                                    ($total_temas == $uni) ? '' : $uni++;
                                                    ($total_temas == $uni) ? $uni-- : '' ;
                                                    $sum++;
                                                }
                                            } else {
                                                $request->session()->push('reparto',date("Y/m/d", $i).'-'.$temas[$uni]->unidad.'-'.$temas[$uni]->nom_tema);
                                                ($total_temas == $uni) ? '' : $uni++;
                                                ($total_temas == $uni) ? $uni-- : '' ;
                                            }
                                        }
                                        
                                    } elseif ($total_temas > $horas_clases) {
                                            $proporcion = ($loop < $residuo_temas) ? $temas_x_hora + 1 : $temas_x_hora; //indica las proporciones a repartir                                        
                                            if ($horario->hrs_totales > 1) {
                                                $cont2=1;
                                                while ($cont2 <= $horario->hrs_totales) {
                                                    $sum=1;
                                                    $proporcion = ($loop < $residuo_temas) ? $temas_x_hora + 1 : $temas_x_hora;
                                                    while ($sum <= $proporcion) {
                                                        $request->session()->push('reparto',date("Y/m/d", $i).'-'.$temas[$uni]->unidad.'-'.$temas[$uni]->nom_tema);
                                                        $sum++;
                                                        ($total_temas == $uni) ? $uni=0 : $uni++;
                                                        ($total_temas == $uni) ? $uni-- : '' ;
                                                    }
                                                    $cont2++; $loop++;
                                                    ($cont2 == $horario->hrs_totales) ? $loop-- : '' ;
                                                }
                                            } else{
                                                $sum=1;
                                                while ($sum <= $proporcion) {
                                                    $request->session()->push('reparto',date("Y/m/d", $i).'-'.$temas[$uni]->unidad.'-'.$temas[$uni]->nom_tema);
                                                    $sum++;
                                                    ($total_temas == $uni) ? $uni=0 : $uni++;
                                                    ($total_temas == $uni) ? $uni-- : '' ;
                                                }
                                            }
                                            $loop++;
                                    }
                                }
                            }
                            break;
                 }
            }
           
           return session('reparto');         
           
        }
        
    }

    private function partition( $temas, $horas ) {
        $temas_total = count( $temas );// 47
        $temas_x_hora = floor( $temas_total / $horas );// 2
        $residuo_temas = $temas_total % $horas; // 7    
        $partition = array();
        $mapeo = 0;
        for ($i = 0; $i < $horas; $i++) {
            $proporcion = ($i < $residuo_temas) ? $temas_x_hora + 1 : $temas_x_hora; //indica las proporciones a repartir       
            $partition[$i] = array_slice( $temas, $mapeo, $proporcion );
            $mapeo += $proporcion; //sirve para indicar hasta que registro comenzar a repartir
            echo $proporcion.'-';
        }
        return $partition;
    }

    private function checkThemeArray($unidad)
    {
        $reparto= session('reparto');
        for ($i=0; $i < count(session('reparto')) ; $i++) { 
            list($fech, $uni, $nom) = explode('-', $reparto[$i]); //divide registro por registro
            if ($unidad == $uni) {
               return Tema::where('antecede',$unidad)->first();
            }else{
                return false;
            }
            
        }
    }
    private function getNameday($td)
    {
        switch ($td->dayOfWeekIso) //Ayuda a saber que dia de la semana es
         {
             case 1:
                 return 'lunes';
                 break;
             case 2:
                 return 'martes';
                 break;
             case 3:
                 return 'miercoles';
                 break;
             case 4:
                 return 'jueves';
                 break;
             case 5:
                 return 'viernes';
                 break;
         }
    }

    private function getBusinessDays($inicio,$fin)
    {
        $l=0; $m=0; $mi=0; $j=0; $v=0;
        for($i=$inicio; $i<=$fin; $i+=86400){
             $td = Carbon::parse(date("Y-m-d", $i));
             switch ($td->dayOfWeekIso) //Ayuda a saber que dia de la semana es
                 {
                     case 1:
                         $l++;
                         //printf("Lunes: %s <br>", date("d-m-Y", $i));
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

        return $total=$l+$m+$mi+$j+$v;
    }

    private function getHolidays($op,$ciclo_actual,$horarios)
    {
        $count_day_asuet=0; 
        $asuetos = array();
        //foreach ($horarios->desglose_horario as $horario){

        //}
        foreach ($ciclo_actual->dias_de_asueto as $dia) {
            if ($dia->fecha_inicio == $dia->fecha_fin ) {
                $dia_asuet = Carbon::parse(date("Y-m-d", strtotime($dia->fecha_inicio)));

                foreach ($horarios->desglose_horario as $horario){
                    if ($horario->dia == $dia_asuet->dayOfWeekIso) {
                        if ($horario->hrs_totales > 1) {
                            $sum=1;
                            while ($sum <= $horario->hrs_totales) {
                                $count_day_asuet++;
                                $sum++;
                            }
                            
                        }  else
                            $count_day_asuet++;
                    }
                 }                   
                array_push($asuetos,$dia->fecha_inicio);
            } else{
                 $fech1 = strtotime($dia->fecha_inicio);
                 $fech2 = strtotime($dia->fecha_fin);
                 for($i=$fech1; $i<=$fech2; $i+=86400){
                    $dia_asuet = Carbon::parse(date("Y-m-d", $i));
                    $a=0;
                    foreach ($horarios->desglose_horario as $horario){
                        if ($horario->dia == $dia_asuet->dayOfWeekIso){
                            if ($horario->hrs_totales > 1){
                                $sum=1;
                                while ($sum <= $horario->hrs_totales ) {
                                    $count_day_asuet++;
                                    $sum++;
                                }
                            } else
                                $count_day_asuet++; // total de dias de asueto
                         } else
                             $a++;
                    }

                    array_push($asuetos,date("Y-m-d", $i));
                 }
            }
        }
        $a--;
       return ($op == 1) ? $asuetos : $count_day_asuet += $a; 
    }
}
