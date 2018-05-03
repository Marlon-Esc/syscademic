<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendario_escolar extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['nombre','fk_administrativo','mision','vision','telefono','correo','perfil_egre'];
    /**
     * Calendario_escolar belongs to .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciclo()
    {
    	// belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
    	return $this->belongsTo(Ciclo_escolar::class);
    }
    /**
     * Calendario_escolar belongs to Plan_escolar.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan_escolar()
    {
    	// belongsTo(RelatedModel, foreignKey = plan_escolar_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Plan_escolar::class);
    }
    /**
     * Calendario_escolar has many Dias_de_asueto.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dias_de_asueto()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = calendario_escolar_id, localKey = id)
    	return $this->hasMany(Dias_de_asueto::class);
    }
}
