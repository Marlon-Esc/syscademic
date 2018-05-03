<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'grupos';
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['grado','fk_panesc','fk_horario','fk_carrera','grupo'];
    /**
     * Grupo belongs to Plan_escolar.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan_escolar()
    {
    	// belongsTo(RelatedModel, foreignKey = plan_escolar_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Plan_escolar::class);
    }
    /**
     * Grupo belongs to Horario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function horario()
    {
    	// belongsTo(RelatedModel, foreignKey = horario_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Horario::class);
    }
    /**
     * Grupo belongs to Carrera.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carrera()
    {
    	// belongsTo(RelatedModel, foreignKey = carrera_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Carrera::class);
    }
    /**
     * Grupo has many Alumno.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alumno()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = grupo_id, localKey = id)
    	return $this->hasMany(Alumno::class);
    }
}
