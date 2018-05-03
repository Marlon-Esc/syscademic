<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
     protected $fillable = ['valor','fk_ciclo','fk_alumno','fk_materia'];
	 protected $table = 'calificaciones';
	
	 public function ciclo_escolar(){
       return $this->belongTo(Ciclo_escolar::class);
	 }
	
	 public function materia(){
       return $this->belongTo(Materia::class);
	 }
}
