<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diciplina extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'diciplinas';
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['descripcion','no_jugadores','entrenador'];
    /**
     * Diciplina has many Participacion.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participacion()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = diciplina_id, localKey = id)
    	return $this->hasMany(Participacion::class);
    }
   
}
