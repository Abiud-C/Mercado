	<div class="card">
		<div class="card-header justify-content-between">
            <div class="d-flex justify-content-between">
                <h6>{{ __('Productos a revisar') }}</h6>
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
					@foreach ($ProductosRevision as $pro)
					<tr id="{{$pro->id}}">
						<td><i class="fas fa-box-open"></i></td>
						<td class="NombrePro">{{$pro->Nombre}}</td>
						<td class="PrecioPro">$ {{$pro->Precio}}</td>
						<td class="EstatusPro">
						@if($pro->Estatus == 1)
							<label class="col-form-label-sm" for="">Consignado</label>
						@else
							<label class="col-form-label-sm" for="">Revisar</label>
						@endif
						</td>
						<td>
							<button class="btn btn-success btn-sm btn_Revision" data-toggle="modal" data-target="#ModalRevisarProductos" id="{{$pro->id}}" ><i class="far fa-registered"></i> Revisar</button>
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>
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
                <button type="button" class="btn btn-secondary btn_Reset_Revisar" data-dismiss="modal">Cancelar</button>
                <button id="NoConsignar" type="button" class="btn btn-outline-warning">No consignar</button>
                <button id="Consignar" type="button" class="btn btn-primary">Consignar</button>
            </div>
            </div>
        </div>
    </div>

    <!--Modal de Razon-->
    