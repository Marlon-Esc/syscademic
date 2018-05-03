<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dias_de_asueto extends Model
{
    protected $fillable = ['fecha'];
	
	public function calendario_escolar(){
		return $this->hasMany(Calendario_escolar::class);
	}
}
