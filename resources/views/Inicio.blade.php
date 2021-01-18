@extends('layouts.app')
@section('content')
<div class="loader-page-get" style="display: none;"></div>
<div class="container-sm"><!--este uso-->
	<!--item que contienen la barra de navegacion de categorias y productos-->
	@include('categorias.NavegadorCategorias')
	<!--termina item-->
	<br>
	<!--seccion que muestra publcidad en la parte superior de la pagina principal-->
	<div class="row" id="PublicidadTopInicio">
		<div id="carouselExampleCaptions" class="carousel slide img-fluid" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
		  </ol>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="/img/Publicidad-Inicio-TuxMercado-01.jpg"  class="d-block w-100  img-fluid card-img-top" alt="...">
		      <div class="carousel-caption d-none d-md-block">
		        <!--h5>First slide label</h5>
		        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p-->
		      </div>
		    </div>
		    <div class="carousel-item">
		      <img src="/img/Publicidad-Inicio-TuxMercado-02.jpg"  class="d-block w-100  img-fluid card-img-top" alt="...">
		      <div class="carousel-caption d-none d-md-block">
		        <!--h5>Second slide label</h5>
		        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p-->
		      </div>
		    </div>
		   </div>
		</div>
	</div>
	<!--fin de la sección de publicidad-->
	<br>
	<!--sección que muestra los productos -->
	<div class="shadow-lg p-3 mb-5 bg-white rounded">
	<div class="row" id="CatalogoProductosInicio">
		 @foreach($Productos as $pro)
		 	<div class="card" style="width: 13.8rem;" id="{{$pro->id}}">
		 		@if(isset($pro->File_Name))
					<img src="{{asset('storage').'/'.$pro->File_Name}}" class="img-thumbnail img-fluid card-img-top " alt="...">
				@endif
			  <div class="card-body">
			    <h6 class="card-text">{{$pro->Nombre}}</h6>
			    <p class="card-text text-success">$ {{$pro->Precio}}</p>
			    <!--a id="{{$pro->id}}" class="btn_Comprar" data-toggle="modal" data-target="#ModalVentaProductos">Ver producto</a-->
			    <div class="form-row">
			    	<a class="stretched-link" href="{{url('productos/'.$pro->id)}}">Ver producto </a>
				</div>
			  </div>
			</div>
		 @endforeach
	</div>
	</div>
	<!--fin de la sección que muestra los productos-->
	<div class="row">
		
	</div>
	<div class="row">
			<h4>Categorías</h4>
	</div>
	<!--sección que muestra las categorias-->
	<div class="row">
		<br>
		<div class="shadow-lg p-3 mb-5 bg-white ">
		<div class="row">
		@foreach($Categoria as $cat)
			<div class="card text-center zoom" style="width: 17.7rem;">
				<div class="card-body">
					<h5 class="card-title">{{$cat->NameCate}}</h5>
					<a href="{{url('inicio/'.$cat->id)}}"class="card-link stretched-link">Más</a>
				</div>
			</div>
		@endforeach
		</div>
		</div>
	</div>
	<!--fin de la sección que muestra las categorias-->
</div>
@endsection