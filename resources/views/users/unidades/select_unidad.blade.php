@extends('layouts.app')
@guest
      @yield('login')
@else
  @section('section', $title)
  @section('title', $title)
  @section('content')

     <div class="row no-print">
  	    <div class="col-xs-12">
  	      <a href="{{ route('unidad.fech',['mod'=>$modalidad, 'clave'=>$clave]) }}" class="btn btn-info" id="btn_fech"><i id="icon_generator" class="fa fa-refresh"></i> Automatizar fechas</a>
  	      <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
  	        <i class="fa fa-download"></i> Generar PDF
  	      </button>
  	    </div>
     </div>
     <br>
     <br>
     <div class="row">
     		{{ $slot }}
     </div>
   	 
@endsection
@endguest
