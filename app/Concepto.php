<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    protected $fillable = ['clave'];
	
	public function pagos(){
		return $this->hasMany(Pago::class);
	}
}
