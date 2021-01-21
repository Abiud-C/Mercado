<div class="table-responsive">
	<table class="table center text-center table-sm" id="tabla_kardexProducto">
		<thead class="thead-dark">
			<tr>
				<th scope="col"></th>
				<th scope="col">Nombre</th>
				<th scope="col">Fecha Publ.</th>
				<th scope="col">Compras</th>
				<th scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
		@foreach ($ProductosCatalogo as $pro)
			<tr id="{{$pro->id}}">
				<td><i class="fas fa-box-open"></i></td>
				<td class="NombrePro">{{$pro->Nombre}}</td>
				<td class="FechaPub">{{$pro->created_at}}</td>
				<td class="Compras"></td>
				<td>
					<a data-toggle="modal" data-target="#ModalRevisarProductos" class="btn btn-success btn-sm btn_Revision"id="{{$pro->id}}"><i class="far fa-registered"></i>Revisar</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
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