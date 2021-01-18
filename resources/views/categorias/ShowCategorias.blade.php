@extends('layouts.app')
@section('content')
<div class="loader-page-get" style="display: none;"></div>
<div class="container-sm"><!--este uso-->
	<!--item que contienen la barra de navegacion de categorias y productos-->
	@include('categorias.NavegadorCategorias')
	<!--termina item-->
	
	<!--ubicación-->
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
	    <li class="breadcrumb-item" aria-current="page">Categorias</li>
	    <li class="breadcrumb-item active" aria-current="page">{{$categoria->NameCate}}</li>
	  </ol>
	</nav>
	<!--fin de la ubicación-->
	
	<!--Nombre de la categoria-->
	<div class="card text-center">
	  <div class="card-body">
	    <h5 class="card-title">{{$categoria->NameCate}}</h5>
	    <p class="card-text">{{$categoria->Description}}.</p>
	  </div>
	</div>
	<!--Fin del nombre de la categoria-->
	<br>
	<!--sección que muestra los productos -->
	<div class="shadow-lg p-3 mb-5 bg-white rounded">
	<div class="row" id="CatalogoProductosInicio">
		 @foreach($productos as $pro)
		 	<div class="card" style="width: 17.3rem;" id="{{$pro->id}}">
		 		@if(isset($pro->File_Name))
					<img src="{{asset('storage').'/'.$pro->File_Name}}" class="img-thumbnail img-fluid card-img-top " alt="...">
				@endif
			  <div class="card-body">
			    <h5 class="card-title">{{$pro->Nombre}}</h5>
			    <h6><strong>Descripción:</strong></h6>
			    <p class="card-text">{{$pro->Descripcion}}</p>
			    <a class="stretched-link" href="{{url('productos/'.$pro->id)}}">Ver producto </a>
			  </div>
			</div>
		 @endforeach
	</div>
	</div>
	<!--fin de la sección que muestra los productos-->
</div>


@endsection