<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planeacion_academica extends Model
{
    protected $fillable = ['fecha_creacion','fk_materia','fk_docente','linea_investigacion','vinculos_asignatura'];
	
	public function materia(){
       return $this->belongTo(Materia::class);
	}
}