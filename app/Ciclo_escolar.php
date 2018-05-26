<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo_escolar extends Model
{
    protected $fillable = ['mes_inicio','mes_fin','anhio','fk_plnesc','sem_program','sem_efec'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ciclos_escolares';
	
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
	/**
	 * Ciclo_escolar has many Clases.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function clases()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = ciclo_escolar_id, localKey = id)
		return $this->hasMany(Clases::class,'fk_cicloesc');
	}
	/**
	 * Ciclo_escolar has many Parcial_total.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function parcial_total()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = ciclo_escolar_id, localKey = id)
		return $this->hasMany(Parcial_total::class,'fk,cicloesc');
	}
	/**
	 * Ciclo_escolar has many Dias_de_asueto.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function dias_de_asueto()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = ciclo_escolar_id, localKey = id)
		return $this->hasMany(Dias_de_asueto::class,'fk_cicloesc');
	}
	/**
	 * Ciclo_escolar has many .
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function parcial()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = ciclo_escolar_id, localKey = id)
		return $this->hasMany(Parcial::class,'fk_cicloesc');
	}
}
