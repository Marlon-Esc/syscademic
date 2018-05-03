<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plantilla_docente extends Model
{
    protected $fillable = ['fk_carrera','grado','fk_planesc','fk_materia','fk_docente','fk_administrativo'];
	
	public function administrativo(){
       return $this->belongTo(Administrativo::class);
	}
	
	public function plan_escolar(){
       return $this->belongTo(Plan_escolar::class);
	}
	
}
