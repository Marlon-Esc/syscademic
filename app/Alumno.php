<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
	//protected $fillable = [''];
     public function ciclo()
    {
    	return $this-> belongsTo(Ciclo::class);
    }
     public function grupo()
    {
    	return $this-> belongsTo(Grupo::class);
    }
      public function pagos()
    {
    	return $this-> hasMany(Pago::class);
    }
     public function participacion()
    {
    	return $this-> hasMany(Participacion::class);
    }
    public function calificaciones()
    {
    	return $this-> hasMany(Calificacion::class);
    }
}
