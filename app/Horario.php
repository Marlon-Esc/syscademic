<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = ['fk_docente','fk_materia','hrs_totales','edo'];
	
	public function desglose_horario(){
		return $this->hasMany(Desglose_horario::class);
	}
	
	public function materia(){
       return $this->belongTo(Materia::class);
	}
}
