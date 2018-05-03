<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
     protected $fillable = ['observ_institu','fk_admin','fk_docente','observ_visit'];
	
	 public function administrativo(){
       return $this->belongTo(Administrativo::class);
	 }
}
