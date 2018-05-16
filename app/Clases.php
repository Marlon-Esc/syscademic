<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clases extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clases';
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['incio','fin','fk_cicloesc','edo'];
    /**
     * Clases belongs to Ciclo_escolar.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciclo_escolar()
    {
    	// belongsTo(RelatedModel, foreignKey = ciclo_escolar_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Ciclo_escolar::class,'fk_cicloesc');
    }
}
