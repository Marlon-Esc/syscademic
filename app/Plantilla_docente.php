<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plantilla_docente extends Model
{
    protected $fillable = ['fk_carrera','grado','fk_planesc','fk_materia','fk_docente','fk_administrativo'];
	
	public function administrativo(){
       return $this->belongTo(Administrativo::class);
	}
	
	/**
	 * Plantilla_docente belongs to Docente.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function docente()
	{
		// belongsTo(RelatedModel, foreignKey = docente_id, keyOnRelatedModel = id)
		return $this->belongsTo(Docente::class,'fk_docente');
	}
	/**
	 * Plantilla_docente has many Horario.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function horario()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = plantilla_docente_id, localKey = id)
		return $this->hasMany(Horario::class,'fk_plantilla');
	}
}
