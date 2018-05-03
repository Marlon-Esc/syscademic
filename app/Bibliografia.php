<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bibliografia extends Model
{
	protected $fillable = ['tipo','titulo','autor','editorial','año','fk_materia'];
    public function materia()
    {
    	// belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
    	return $this->belongsTo(Materia::class);
    }
    
}
