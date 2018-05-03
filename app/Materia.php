<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = ['anhio','objetivo_gnral','hrs_docente','hrs_independientes','creditos','instalaciones','grado','fk_plan','edo'];
	
	public function horario(){
		return $this->belongsTo(Horario::class);
	}
	
	public function temas(){
		return $this->hasMany(Tema::class);
	}
	
	public function planeacion_academica(){
		return $this->hasMany(Planeacion_academica::class);
	}
	
	public function calificaciones(){
		return $this->hasMany(Calificacion::class);
	}
	
	public function bibliografias(){
		return $this->hasMany(Bibliografia::class);
	}
	
	public function plan_escolar(){
       return $this->belongTo(Plan_escolar::class);
	}
}
