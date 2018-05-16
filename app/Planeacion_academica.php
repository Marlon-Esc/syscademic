<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planeacion_academica extends Model
{
    protected $fillable = ['fecha_creacion','fk_materia','fk_docente','linea_investigacion','vinculos_asignatura'];
	
	public function materia(){
       return $this->belongTo(Materia::class,'clave_materia');
	}
	/**
	 * Planeacion_academica belongs to Plan_escolar.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function plan_escolar()
	{
		// belongsTo(RelatedModel, foreignKey = plan_escolar_id, keyOnRelatedModel = id)
		return $this->belongsTo(Plan_escolar::class,'fk_planesc');
	}
	/**
	 * Planeacion_academica belongs to Doncente.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function doncente()
	{
		// belongsTo(RelatedModel, foreignKey = doncente_id, keyOnRelatedModel = id)
		return $this->belongsTo(Doncente::class,'fk_docente');
	}
}