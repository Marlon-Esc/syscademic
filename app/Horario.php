<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = ['fk_docente','clave_materia','fk_grupo','edo'];
	
	public function desglose_horario(){
		return $this->hasMany('App\Desglose_horario','fk_horario');
	}
	
	/**
	 * Horario belongs to Materia.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function materia()
	{
		// belongsTo(RelatedModel, foreignKey = materia_id, keyOnRelatedModel = id)
		return $this->belongsTo('App\Materia','clave_materia','clave');
	}
	/**
	 * Horario belongs to Docente.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function docente()
	{
		// belongsTo(RelatedModel, foreignKey = docente_id, keyOnRelatedModel = id)
		return $this->belongsTo('App\Docente','fk_docente');
	}
	/**
	 * Horario belongs to Grupo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function grupo()
	{
		// belongsTo(RelatedModel, foreignKey = grupo_id, keyOnRelatedModel = id)
		return $this->belongsTo(Grupo::class,'fk_grupo');
	}
}
