@php
  $cuatri = session('user.mat_cua'); 
  $semestre = session('user.mat_sem'); 
@endphp 
@extends('layouts.app')
@section('content')
  <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $total_materias }}</h3>

              <p>Materias asignadas</p>
            </div>
            <div class="icon">
              <i class="ion ion-social-buffer-outline"></i>
            </div>
            <li  class="small-box-footer"></li>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $plan_term }}</h3>

              <p>Planeaciones terminadas</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-list-outline"></i>
            </div>
            <li  class="small-box-footer"></li>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $total_grupos }}</h3>

              <p>Grupos asignados</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <li  class="small-box-footer"></li>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $plan_pend }}</h3>

              <p>Planeaciones pendientes</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-clipboard"></i>
            </div>
            <li  class="small-box-footer"></li>
          </div>
        </div>
        <!-- ./col -->
  </div>
  <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Avance de planeaciones</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                  <p class="text-center">
                    <strong>Asignaturas Cuatrimestrales</strong>
                  </p>
                  @if (count(session('user.mat_cua.nombre')) > 0)
                    @for ($i = 0; $i < count(session('user.mat_cua.nombre')) ; $i++)
                      <div class="progress-group">
                        <a href="{{ route('unidad.index',['id'=>$cuatri['clave'][$i],'mod'=> $cuatri['mod'][$i],'fk'=>$cuatri['fk_grupo'][$i]]) }}"<span class="progress-text">{{ $cuatri['nombre'][$i] }}</span></a>
                        @if ($cuatri['progreso'][$i] == 100.00)
                          <span class="progress-number"><b>Terminado!</span>
                        @else
                          <span class=" progress-number "><b>{{ $cuatri['progreso'][$i] }}%</span>
                        @endif
                        <div class="progress progress-sm active">
                          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width: {{ $cuatri['progreso'][$i] }}%"></div>
                        </div>
                      </div>
                    @endfor
                  @else
                    <h4>No hay asignaturas</h4>
                  @endif
                </div>
                <div class="col-md-12">
                  <p class="text-center">
                    <strong>Asignaturas Semestrales</strong>
                  </p>
                  @if (count(session('user.mat_sem.nombre')) > 0)
                    @for ($i = 0; $i < count(session('user.mat_sem.nombre')) ; $i++)
                      <div class="progress-group">
                        <a href="{{ route('unidad.index', ['id'=>$semestre['clave'][$i],'mod'=> $semestre['mod'][$i],'fk'=>$semestre['fk_grupo'][$i]]) }}">
                          <span class="progress-text">{{ $semestre['nombre'][$i] }}</span>
                         </a> 
                         @if ($semestre['nombre'][$i] == 100.00)
                           <span class="progress-number"><b>Terminado!</span>
                         @else  
                           <span class="progress-number"><b>{{ $semestre['progreso'][$i] }}%</span>
                         @endif
                        <div class="progress sm active">
                          <div class="progress-bar progress-bar-yellow progress-bar-striped" style="width: {{ $semestre['progreso'][$i] }}%"></div>
                        </div>
                      </div>
                    @endfor
                  @else
                    <h4>No hay asignaturas</h4>
                  @endif
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
  </div>
 
@endsection