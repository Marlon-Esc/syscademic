<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desglose_planeacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'desglose_planeaciones';
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['semana','fecha','horas','fk_tema','fk_planaca','aprendisaje_esperado','actividad_aprendisaje','evidencias_aprendido'];
    /**
     * Desglose_planeacion belongs to Tema.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tema()
    {
    	// belongsTo(RelatedModel, foreignKey = tema_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Tema::class,'fk_tema');
    }
    /**
     * Desglose_planeacion belongs to Planeacion_academica.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function planeacion_academica()
    {
    	// belongsTo(RelatedModel, foreignKey = planeacion_academica_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Planeacion_academica::class);
    }
}
