<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['unidad','nom_tema','fk_materia','no_unidad'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'temas';
    /**
     * Tema belongs to Materia.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materia()
    {
    	// belongsTo(RelatedModel, foreignKey = materia_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Materia::class);
    }
    /**
     * Tema has many Desglose_planeacion.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function desglose_planeacion()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = tema_id, localKey = id)
    	return $this->hasMany(Desglose_planeacion::class,'fk_tema');
    }
}
