<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'docentes';
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['nombre','licenciatura','telefono','direccion','sexo','maestria'];
    /**
     * Docente has many Horario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horario()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = docente_id, localKey = id)
    	return $this->hasMany('App\Horario','fk_docente');
    }
    /**
     * Docente has many Usuario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /**
     * Docente has one User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        // hasOne(RelatedModel, foreignKeyOnRelatedModel = docente_id, localKey = id)
        return $this->hasOne('App\User','fk_cuenta');
    }
    /**
     * Docente has many Observacion.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function observacion()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = docente_id, localKey = id)
    	return $this->hasMany(Obervacion::class);
    }
    /**
     * Docente has many .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plantilla_docente()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = docente_id, localKey = id)
    	return $this->hasMany(Plantilla_docente::class);
    }
    /**
     * Docente has many Planeacion_academica.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planeacion_academica()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = docente_id, localKey = id)
    	return $this->hasMany(Planeacion_academica::class);
    }

}
