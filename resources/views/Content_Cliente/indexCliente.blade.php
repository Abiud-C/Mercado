@extends('layouts.app')
@section('content')
<div class="loader-page-get" style="display: none;"></div>
	<div class="container-fluid">
		<div class="content-header">
    		<nav aria-label="breadcrumb">
		  	<ol class="breadcrumb">
		    	<li class="breadcrumb-item active" aria-current="page">Bienvenido Cliente</li>
		  	</ol>
			</nav>
    	</div>
    	<div class="row">
    		<div class="col-sm-2 container-fluid">
    			<ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <li class="nav-item">
      				  <a class="nav-link active" id="v-pills-Inicio-tab" data-toggle="pill" href="#v-pills-Inicio" role="tab" aria-controls="v-pills-Inicio" aria-selected="true">      <i class="fas fa-home"></i> 
                            Inicio
                       </a>
                    </li>
                    <li class="nav-item">
      				   <a class="nav-link" id="v-pills-ProductosCliente-tab" data-toggle="pill" href="#v-pills-ProductosCliente" role="tab" aria-controls="v-pills-ProductosCliente" aria-selected="false">
                            <i class="fas fa-box-open"></i>
                            Mis productos
                        </a>
                    </li>
                    <li class="nav-item">
      				    <a class="nav-link" id="v-pills-Preguntas-tab" data-toggle="pill" href="#v-pills-Preguntas" role="tab" aria-controls="v-pills-Preguntas" aria-selected="false">
                            <i class="fas fa-question"></i> 
                            Preguntas
                        </a>
                    </li>
    			</ul>
    		</div>
    		<div class="col-sm">
                <div class="container-sm">
    			     <div class="tab-content container-sm" id="v-pills-tabContent">
    				    <div class="tab-pane fade show active" id="v-pills-Inicio" role="tabpanel" aria-labelledby="v-pills-Inicio-tab">
                            @include('auth.perfil')
    				    </div>
    				    <div class="tab-pane fade" id="v-pills-ProductosCliente" role="tabpanel" aria-labelledby="v-pills-ProductosCliente-tab">
    					    @include('productos.IndexProductos')
    				    </div>
                        <div class="tab-pane fade" id="v-pills-Preguntas" role="tabpanel" aria-labelledby="v-pills-Preguntas-tab">
                            @include('preguntas.IndexPreguntas')
                        </div>
    			     </div>
                </div>
    		</div>
    	</div>
    </div>
@endsection