@extends('layouts.app')
@guest
      @yield('login')
@else
  @section('section', $title)
  @section('title', $title)
  @section('content')
    {{ $alert }}
     <div class="row no-print">
  	    <div class="col-xs-12">
  	      <a href="{{ route('unidad.fech',['mod'=>$modalidad, 'clave'=>$clave, 'fk'=>$fk]) }}" class="btn btn-info" id="btn_fech"><i id="icon_generator" class="fa fa-refresh"></i> Automatizar fechas</a>
  	      <a href="{{ url('planeacion_rpt',['mod'=>$modalidad, 'clave'=>$clave, 'fk'=>$fk]) }}" target="_blank" class="btn btn-primary pull-right" style="margin-right: 5px;">
  	        <i class="fa fa-download"></i> Generar PDF
  	      </a>
  	    </div>
     </div>
     <br>
     <br>
     <div class="row">
     		{{ $slot }}
     </div>
   	 
@endsection
@endguest
