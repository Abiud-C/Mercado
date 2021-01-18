<!--vista previa en inicio-->
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
      <li class="breadcrumb-item" aria-current="page">{{$Vista_Producto->categoria->NameCate}}</li>
      <li class="breadcrumb-item active" aria-current="page">{{$Vista_Producto->Nombre}}</li>
    </ol>
  </nav>
  <!--fin de la ubicación-->
  <br>
  <div class="shadow-lg p-3 mb-5 bg-white rounded">
    <form  id="FormVenta">
      <meta name="csrf-token" content="{{ csrf_token() }}">         
        <div class="row idProducto" id="{{$Vista_Producto->id}}">
          <div class="col">
              <img id="foto" src="{{asset('storage').'/'.$Foto_Producto->File_Name}}" class="img-fluid mx-auto" alt="Responsive image">
          </div>
          <div class="col">
          <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <h5>{{$Vista_Producto->Nombre}}</h5>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <h6>Precio.</h6>
                <label class="col-form text-success" id="Precio"><h4>${{$Vista_Producto->Precio}}</h4></label>
              </div>
              <div class="form-group col-md-6">
                <h6>Disponibles.</h6>
                <label class="col-form-label-sm text-secondary" id="Cantidad">{{$Vista_Producto->Cantidad}}</label>
              </div>
            </div>
            <div class="form-group">
              <h6>Descripción.</h6>
              <label class="col-form-label-sm" id="Descripcion">{{$Vista_Producto->Descripcion}}</label>
            </div>
            <div class="form-group">
              <h6>Garantia del producto.</h6>
              <label class="col-form-label-sm" id="Garantia">{{$Vista_Producto->Garantia}}</label>
            </div>
            <!--Formulario de compra-->
            <div class="form-group">
              <h6>Stock disponible</h6>
              <div class="input-group ">
                <div class="input-group-prepend">
                  <label class="input-group-text text-secondary" for="CantidadCompra"><strong class="text-body">Cantidad</strong>({{$Vista_Producto->Cantidad}} disponibles) <strong class="text-body">:</strong></label>
                </div>
                <select class="custom-select" id="CantidadCompra">
                  <option value="1" selected>1 unidad</option>
                  @for ($i = 2; $i <= $Vista_Producto->Cantidad; $i++)
                  <option value="{{$i}}">{{ $i }} unidades</option>
                   @endfor
                </select>
              </div>
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-primary btn-block Comprar">Comprar ahora</button>
              <button type="button" class="btn btn btn-secondary btn-block AddCar"><i class="fas fa-cart-plus"></i> Agregar al carrito</button>
            </div>
            <!--termina formulario de compra-->
          </form>
          </div>
        </div>
          <button class="btn btn-outline-info btn-block btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
           Ver más
          </button>
        <div class="collapse" id="collapseExample">
          <hr>
          <div class="row">
            <div class="col">
              <form>
                <div class="form-group">
                  <label class="col-form" for="Caracteristicas"><strong>Caracteristicas.</strong></label>
                  <label class="col-form-label-sm" id="Caracteristicas" disabled name="Caracteristicas">{{$Vista_Producto->Caracteristicas}}</label>
                </div>
                <!--items que representan formularios-->
                <div class="form-group" id="Preguntar">
                  <label class="col-form"><strong>Preguntas y respuestas.</strong></label>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    @include('preguntas.FormPreguntas')
                    <div class="form-group" id="Mipregunta">
                  
                    </div>
                </div>
                <hr>
                <div class="form-group" id="MostrarPreguntasVenta">
                  <form id="ListFormP">
                    <h6 class="text-secondary">Últimas realizadas</h6>
                    @include('preguntas.ListPreguntasVenta')
                  </form>
                </div>
                <!--Termina items-->
              </form>
            </div>
            <div class="col">
              <label class="col-form"><strong>Medios de pago.</strong></label>
            </div>
          </div>
        </div>
    </form>
  </div>
</div>
@endsection