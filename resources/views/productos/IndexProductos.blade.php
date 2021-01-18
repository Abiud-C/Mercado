
<div class="loader-page-get" style="display: none;"></div>
<div class="container"><!--este uso-->
    @if(Session::has('Mensaje'))
		<div class="alert alert-success" role="alert" data-delay="1000">	
		{{
			Session::get('Mensaje')
		}}
		</div>
	@endif
	<div class="card">
		<div class="card-header justify-content-between">
            <div class="d-flex justify-content-between">
                <h6>{{ __('Mostrando Productos') }}</h6>
				<a class="btn btn-primary btn-sm" href="{{ url('productos/create') }}"><i class="far fa-plus-square"></i>Nuevo producto</a>
            </div>
        </div>
        <div class="card-body">
        	<div class="table-responsive">
				<table class="table center text-center table-sm" id="tabla_producto">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col"></th>
				      <th scope="col">Nombre</th>
				      <th scope="col">Precio</th>
				      <th scope="col">Estatus</th>
				      <th scope="col">Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($Producto as $pro)
				    <tr id="{{$pro->id}}">
				      <td><i class="fas fa-box-open"></i></td>
				      <td class="NombrePro">{{$pro->Nombre}}</td>
				      <td class="PrecioPro">$ {{$pro->Precio}}</td>
				      <td class="EstatusPro">
						@if($pro->Estatus == 1)
						<label class="col-form-label-sm" for="">Consignado</label>
						@else
						<label class="col-form-label-sm" for="">En revisión</label>
						@endif
				      </td>
				      <td>
				      	<button type="button" class="btn btn-primary btn-sm btn_Revision" id="{{$pro->id}}" data-toggle="modal" data-target="#ModalRevisarProductos" data-toggle="tooltip" data-placement="top" title="Ver detalles del Producto"><i class="far fa-eye"></i></button>

				      	<a class="tn btn-success btn-sm" href="{{url('/productos/'.$pro->id.'/edit')}}" id="{{$pro->id}}" ata-toggle="tooltip" data-placement="top" title="Editar Producto"><i class="far fa-edit"></i></a>

				      	@if($pro->Estatus == 1)
						<button type="button" class="btn btn-danger btn-sm" id="{{$pro->id}}" disabled data-toggle="tooltip" data-placement="top" title="No se puede eliminar"><i class="far fa-trash-alt"></i></button>
						@else
						<button type="button" class="btn btn-danger btn-sm" id="{{$pro->id}}" data-toggle="tooltip" data-placement="top" title="Eliminar producto"><i class="far fa-trash-alt"></i></button>
						@endif
				      </td>
				    </tr>
				    @endforeach
				  </tbody>
				</table>
			</div>
        </div>
	</div>
</div>

<!--Modal De Productos-->
    <div class="modal fade" id="ModalRevisarProductos" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ModalRevisarProductosLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalRevisarProductosLabel"></h5>
                    <button type="button" class="close btn_Reset_Revisar" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
            	<form  id="FormRevision">
            		<meta name="csrf-token" content="{{ csrf_token() }}">
            		@include('productos.ShowProductos')
            	</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
            </div>
        </div>
    </div>
