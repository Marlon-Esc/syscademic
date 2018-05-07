<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desglose_horario extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'desglose_horarios';
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['dia','inicio','fin','hrs_totales','fk_horario'];
    /**
     * Desglose_horario belongs to Horario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function horario()
    {
    	// belongsTo(RelatedModel, foreignKey = horario_id, keyOnRelatedModel = id)
    	return $this->belongsTo('App\Horario','fk_horario');
    }
}
