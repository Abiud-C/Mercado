@extends('layouts.app')
@section('content')
<div class="container"><!--este uso-->
  <div class="content-header">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Acualizar Producto</li>
      </ol>
    </nav>
  </div>
  	@if(count($errors)>0)
	<div class="alert alert-danger" role="alert">
		<ul>
			@foreach($errors->all() as $error)

			<li>{{$error}}</li>

			@endforeach
		</ul>
	</div>
	@endif
  <form action="{{url('/productos')}}" method="PUT" action="" id="ProductosForm" enctype="multipart/form-data">
    {{ csrf_field() }}

    @include('productos.Create_Productos.FormProductos',['Modo'=>'editar'])
  </form>

</div>
@endsection