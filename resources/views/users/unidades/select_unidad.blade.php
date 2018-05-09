@extends('layouts.app')
@section('section', $title)
@section('title', $title)
@section('content')
   <div class="row no-print">
	    <div class="col-xs-12">
	      <a href="#" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
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