@php
  $cuatri = session('user.mat_cua'); 
  $semestre = session('user.mat_sem'); 
@endphp 
@section('section', 'Bienvenido')
 <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('img/man.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ session('user_name') }}</p>
          <!-- Status -->
          <a href="{{ route('home') }}"><i class="fa fa-circle text-success"></i> Conectado</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <div class="sidebar-form">
        <a href="http://iesch.edu.mx" type="button"  class="btn btn-flat" style="width: 100%;">
          UNIVERSIDAD SALAZAR
        </a>
      </div>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header text-center">OPCIONES</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{ route('home') }}"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
        
        <li class="treeview">
          <a href="#"><i class="fa  fa-file-text"></i> <span>Planeaciones</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><span class="fa fa-circle-o"></span>Planeaciones terminadas</a></li>
            <li><a href="#"><span class="fa fa-circle-o"></span>Planeaciones pendientes</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-bookmark"></i> <span>Materias cuatri</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            @if (count(session('user.mat_cua.nombre')) > 0)
              @for ($i = 0; $i < count(session('user.mat_cua.nombre')) ; $i++)
                  <li>
                    <a href="{{ route('unidad.index', $cuatri['clave'][$i]) }}">
                        <h6><span class="fa fa-circle-o"> </span> {{ $cuatri['nombre'][$i] }}</h6>
                      </a>
                  </li>
              @endfor  
            @else
              <li><a href="#"><h6>No hay materias asignadas</h6></a></li>
            @endif
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-bookmark"></i> <span>Materias Semestral</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            @if (count(session('user.mat_cua.nombre')) > 0)
              @for ($i = 0; $i < count(session('user.mat_sem.nombre')) ; $i++)
                  <li>
                    <a href="{{ route('unidad.index', $semestre['clave'][$i]) }}">
                        <h6><span class="fa fa-circle-o"> </span> {{ $semestre['nombre'][$i] }}</h6>
                      </a>
                  </li>
              @endfor  
            @else
              <li><a href="#"><h6>No hay materias asignadas</h6></a></li>
            @endif
          </ul>
          
        </li>

        <li class="header text-center">CONFIGURACIONES</li>
        <li><a href="#"><i class="fa fa-gears"></i> <span>Configuración de cuenta</span></a></li>
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
