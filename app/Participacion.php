<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participacion extends Model
{
    protected $fillable = ['anhio','edo','fk_ciclo','fk_alumno','fk_disciplina'];
	
	public function ciclo_escolar(){
       return $this->belongTo(Ciclo_escolar::class);
	}
}
