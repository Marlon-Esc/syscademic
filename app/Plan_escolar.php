<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan_escolar extends Model
{
    protected $fillable = ['id','descripcion','edo'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'planes_escolares';
	public $incrementing = false; // sirve para los ID's que son de tipo string y no arroje valores en 0
	public function grupos(){
		return $this->hasMany(Grupo::class);
	}
	
	public function calendario_escolar(){
		return $this->hasMany(Calendario_escolar::class);
	}
	
	public function plan_estudios(){
		return $this->hasMany(Plan_estudio::class);
	}
	
	public function ciclo_escolar(){
		return $this->hasMany(Ciclo_escolar::class);
	}
	
	public function plantilla_docente(){
		return $this->hasMany(Plantilla_docente::class);
	}
	
	public function materias(){
		return $this->hasMany(Materia::class);
	}
}