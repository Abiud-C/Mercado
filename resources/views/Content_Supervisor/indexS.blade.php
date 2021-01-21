@extends('layouts.app')
@section('content')
<div class="loader-page-get" style="display: none;"></div>
<div class="container-fluid">
	<div class="content-header">
    	<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb">
		    	<li class="breadcrumb-item active" aria-current="page">Bienvenido Supervisor</li>
		  	</ol>
		</nav>
    </div>
    <div class="row">
    	<div class="col-sm-2 container-fluid">
    		<ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <li class="nav-item">
      			   <a class="nav-link active" id="v-pills-Inicio-tab" data-toggle="pill" href="#v-pills-Inicio" role="tab" aria-controls="v-pills-Inicio" aria-selected="true">
                        <i class="fas fa-home"></i> 
                        Inicio
                    </a>
                </li>
                <!--li class="nav-item">
      			   <a class="nav-link" id="v-pills-Tablero-tab" data-toggle="pill" href="#v-pills-Tablero" role="tab" aria-controls="v-pills-Tablero" aria-selected="false">
                        <i class="far fa-address-card"></i> 
                        Generales
                    </a>
                </li-->
                <li class="nav-item">
      			   <a class="nav-link" id="v-pills-Categorias-tab" data-toggle="pill" href="#v-pills-Categorias" role="tab" aria-controls="v-pills-Categorias" aria-selected="false">
                        <i class="fas fa-puzzle-piece"></i> 
                        Categorias
                    </a>
                </li>
                <li class="nav-item">
      			   <a class="nav-link" id="v-pills-Usuarios-tab" data-toggle="pill" href="#v-pills-Usuarios" role="tab" aria-controls="v-pills-Usuarios" aria-selected="false">
                        <i class="fas fa-user-cog"></i> 
                        Usuarios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="v-pills-kardex-tab" data-toggle="pill" href="#v-pills-kardex" role="tab" aria-controls="v-pills-kardex" aria-selected="false">
                        <i class="fas fa-money-check"></i> 
                        Kardex Productos
                    </a>
                </li>
    		</ul>
    	</div>
    	<div class="col-sm">
            <div class="container-sm">
                <div class="tab-content container-sm" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-Inicio" role="tabpanel" aria-labelledby="v-pills-Inicio-tab">
    				    @include('Content_Supervisor.TableroMercado')
                    </div>
                    <div class="tab-pane fade" id="v-pills-Tablero" role="tabpanel" aria-labelledby="v-pills-Tablero-tab">
    				    @include('metodo_pago.indexMetodoPago')
                    </div>
                    <div class="tab-pane fade" id="v-pills-Categorias" role="tabpanel" aria-labelledby="v-pills-Categorias-tab">
    				    @include('categorias.IndexCategorias')
                    </div>
                    <div class="tab-pane fade" id="v-pills-Usuarios" role="tabpanel" aria-labelledby="v-pills-Usuarios-tab">
    				    @include('auth.restUser')
                    </div>
                    <div class="tab-pane fade" id="v-pills-kardex" role="tabpanel" aria-labelledby="v-pills-kardex-tab">
                        @include('Content_Supervisor.KardexProductos')
                    </div>
                </div>
    		</div>
    	</div>
    </div>
    </div>
@endsection