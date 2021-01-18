@extends('layouts.app')
@section('content')
<div class="container">
  <div class="content-header">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-between">
        <li class="breadcrumb-item active" aria-current="page">Nuevo Producto</li>
        <li><a href="{{url('Cliente')}}"><i class="fas fa-backspace"></i> Regresar</a></li>
      </ol>
    </nav>
  </div>
  <form action="{{url('/productos')}}" method="POST" id="ProductosForm" enctype="multipart/form-data">
    {{ csrf_field() }}

    @include('productos.Create_Productos.FormProductos',['Modo'=>'crear'])
  </form>

</div>
@endsection