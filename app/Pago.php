<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['folio','fk_alumno','fk_concepto','fk_ciclo'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pagos';
    /**
     * Pago belongs to Alumno.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alumno()
    {
    	// belongsTo(RelatedModel, foreignKey = alumno_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Alumno::class);
    }
    /**
     * Pago belongs to Concepto.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function concepto()
    {
    	// belongsTo(RelatedModel, foreignKey = concepto_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Concepto::class);
    }
    /**
     * Pago belongs to Ciclo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciclo_escolar()
    {
    	// belongsTo(RelatedModel, foreignKey = ciclo_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Ciclo_escolar::class);
    }
}
