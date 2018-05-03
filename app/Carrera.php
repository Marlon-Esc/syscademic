<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['nombre','fk_administrativo','mision','vision','telefono','correo','perfil_egre'];
    /**
     * Carrera belongs to Administrativo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function administrativo()
    {
    	// belongsTo(RelatedModel, foreignKey = administrativo_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Administrativo::class);
    }
    /**
     * Carrera has many Plantilla_docente.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plantilla_docente()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = carrera_id, localKey = id)
    	return $this->hasMany(Plantilla_docente::class);
    }
    /**
     * Carrera has many Plan_estudio.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plan_estudio()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = carrera_id, localKey = id)
    	return $this->hasMany(Plan_etudio::class);
    }
    /**
     * Carrera has many Grupo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupo()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = carrera_id, localKey = id)
    	return $this->hasMany(Grupo::class);
    }
    /**
     * Carrera has many Horario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horario()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = carrera_id, localKey = id)
    	return $this->hasMany(Horario::class);
    }
}
