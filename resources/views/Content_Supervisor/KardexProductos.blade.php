<div class="table-responsive">
	<table class="table center text-center table-sm" id="tabla_kardexProducto">
		<thead class="thead-dark">
			<tr>
				<th scope="col"></th>
				<th scope="col">Nombre</th>
				<th scope="col">Fecha Publ.</th>
				<th scope="col">Preguntas</th>
				<th scope="col">Compras</th>
				<th scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
		<!--@foreach ($ProductosRevision as $pro)-->
			<tr id="{{$pro->id}}">
				<td><i class="fas fa-box-open"></i></td>
				<td class="NombrePro">{{$pro->Nombre}}</td>
				<td></td>
				<td class="PrecioPro">$ {{$pro->Precio}}</td>
				<td class="EstatusPro">
					@if($pro->Estatus == 1)
						<label class="col-form-label-sm" for="">Consignado</label>
					@else
						<label class="col-form-label-sm" for="">Revisar</label>
					@endif
				</td>
				<td>
					<a class="tn btn-success btn-sm" href="{{url('/productos/'.$pro->id.'/edit')}}" id="{{$pro->id}}"><i class="far fa-registered"></i>evisar</a>
				</td>
			</tr>
		<!--@endforeach-->
		</tbody>
	</table>
</div>