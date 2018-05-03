@extends('layouts.app')
@section('content')
  <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>0</h3>

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
              <h3>0</h3>

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
              <h3>0</h3>

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
              <h3>0</h3>

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
                    <strong>Asignaturas</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Robotica</span>
                    <span class="progress-number"><b>80%</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Electronica I</span>
                    <span class="progress-number">30%</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 30%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Redes computacionales II</span>
                    <span class="progress-number">50%</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 50%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Diseño de base de datos</span>
                    <span class="progress-number">Terminado!</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
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
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Registro de actividad</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img src="{{ asset('img/man.png') }}" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Usuario
                      <span class="label label-danger pull-right">Eliminar</span></a>
                      
                    <span class="product-description">
                          Se ha añadido un AE a la unidad 1
                    </span>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">Ver mas registros</a>
            </div>
            <!-- /.box-footer -->
          </div>
      </div>
    </div>
  </div>
@endsection