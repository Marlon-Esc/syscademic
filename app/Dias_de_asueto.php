<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dias_de_asueto extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'dias_de_asuetos';
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['fecha_inicio','fecha_fin','fk_cicloesc'];
	/**
	 * Dias_de_asueto belongs to Ciclo_escolar.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function ciclo_escolar()
	{
		// belongsTo(RelatedModel, foreignKey = ciclo_escolar_id, keyOnRelatedModel = id)
		return $this->belongsTo(Ciclo_escolar::class,'fk_cicloesc');
	}
}
