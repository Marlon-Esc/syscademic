<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcial_total extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'parcial_totales';
	/**
	 * Fields that can be mass assigned.
	 *
	 * @var array
	 */
	protected $fillable = ['p1','p2','final','fk_cicloesc'];
    /**
     * Parcial_total belongs to .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciclo_escolar()
    {
    	// belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
    	return $this->belongsTo(Ciclo_escolar::class,'fk,cicloesc');
    }
}
