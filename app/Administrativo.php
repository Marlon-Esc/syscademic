<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
     protected $fillable = ['nombre','cargo','edo'];
	
	 public function carreras(){
       return $this->hasMany(Carrera::class);
	 }
	
	 public function plantilla_doc(){
       return $this->hasMany(Plantilla_docente::class);
	 }
	
	 public function observaciones(){
       return $this->hasMany(Observacion::class);
	 }
}
