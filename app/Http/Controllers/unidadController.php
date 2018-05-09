<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tema;
class unidadController extends Controller
{
    public function index(Request $request, $id){
    	$request->session()->forget('unidad');
    	$total_temas = Tema::where('clave_materia',$id)->max('no_unidad'); //total te unidades
    	//return $total_temas.'<br>';
    	for ($i=1; $i <= $total_temas ; $i++) {
    		//$nombre = Tema::where('unidad',$i)->get();
    		//echo $nombre['nom_tema'];
    		//$request->session()->push('unidad', $nombre->nom_tema);
    		$nombre = Tema::where('unidad',$i)->get();
	    	foreach ($nombre as $nomb) {
	    		//echo $nomb->nom_tema.'<br>';
	    		$request->session()->push('unidad', $nomb->nom_tema);
	    	}
    	}
    	//$var=session('unidad');
      	//return $var;
        return view('components.unidad',compact('total_temas'));
    }
    public function planificar(){
    	//
    }
}
