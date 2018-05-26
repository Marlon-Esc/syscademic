<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcial extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parciales';
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['clave_materia','p1','p2','pf'];
    /**
     * parcial belongs to Materia.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materia()
    {
    	// belongsTo(RelatedModel, foreignKey = materia_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Materia::class,'clave_materia');
    }
    /**
     * Parcial belongs to Ciclo_escolar.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciclo_escolar()
    {
        // belongsTo(RelatedModel, foreignKey = ciclo_escolar_id, keyOnRelatedModel = id)
        return $this->belongsTo(Ciclo_escolar::class,'fk_cicloesc');
    }
}
