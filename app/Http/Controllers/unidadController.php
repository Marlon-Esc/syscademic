<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tema;
use App\Materia;
class unidadController extends Controller
{

    public function index(Request $request, $id){
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
        return view('components.unidad',compact('total_temas','materia'));
    }

    public function planificar(){
    	return view('users.unidades.planificacion');
    }
}
