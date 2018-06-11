<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan_estudio extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'plan_estudios';
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['fk_carrera','vigencia_plan','revoe','fk_planesc'];
    /**
     * Plan_estudio belongs to Plan_escolar.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan_escolar()
    {
    	// belongsTo(RelatedModel, foreignKey = plan_escolar_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Plan_escolar::class);
    }
    /**
     * Plan_estudio belongs to Carrera.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carrera()
    {
    	// belongsTo(RelatedModel, foreignKey = carrera_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Carrera::class);
    }
    /**
     * Plan_estudio has many Materia.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materia()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = plan_estudio_id, localKey = id)
    	return $this->hasMany(Materia::class,'fk_plan');
    }

}
