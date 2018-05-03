<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo_escolar extends Model
{
    protected $fillable = ['mes_inicio','mes_fin','anhio','fk_plnesc','sem_program','sem_efec'];
	
	public function calendario_escolar(){
		return $this->hasMany(Cendario_escolar::class);
	}
	
	public function plan_estudio(){
		return $this->hasMany(Plan_estudio::class);
	}
	
	public function calificaciones(){
		return $this->hasMany(Calificacion::class);
	}
	
	public function alumnos(){
		return $this->hasMany(Alumno::class);
	}

	public function pagos(){
		return $this->hasMany(Pago::class);
	}
	
	public function participacion(){
		return $this->hasMany(Participacion::class);
	}
	
	public function plan_escolar(){
       return $this->belongTo(Plan_escolar::class);
	}
}
