<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = ['anhio','clave','seriacion','objetivo_gnral','hrs_docente','hrs_independientes','creditos','instalaciones','grado','fk_plan','edo'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'materias';
	
	/**
	 * Materia has many Horario.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function horario()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = materia_id, localKey = id)
		return $this->hasMany('App\Horario','clave_materia','clave');
	}
	/**
	 * Materia has many Parcial.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function parcial()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = materia_id, localKey = id)
		return $this->hasMany(Parcial::class,'clave_materia');
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
