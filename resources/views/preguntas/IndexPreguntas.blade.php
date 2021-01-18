<div class="loader-page-get" style="display: none;"></div>
<div class="container">
	<div class="card">
		<div class="card-header justify-content-between">
            <div class="d-flex justify-content-between">
                <h6>{{ __('Mostrando Preguntas') }}</h6>
            </div>
        </div>
        <div class="card-body">
        	<div class="table-responsive">
				<table class="table center text-center table-sm" id="tabla_preguntas">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">N° Pregunta</th>
				      <th scope="col">Producto</th>
				      <th scope="col">Fecha</th>
				      <th scope="col">Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($Pregunta as $pregunta)
				  		<tr id='{{$pregunta->id}}'>
				  			<td>{{$loop->iteration}}</td>
				  			<td class="NombreProducto">{{$pregunta->nombre}}</td>
				  			<td>{{$pregunta->created_at}}</td>
				  			<td>
				  				<button class="btn btn-primary btn-sm modalrespuesta" data-toggle="modal" data-target="#ModalRespuesta" id='{{$pregunta->id}}'>Responder</button>
				  			</td>
				  		</tr>
				  	@endforeach
				  </tbody>
				</table>
			</div>
        </div>
	</div>
</div>
<!--Modal-->
<div class="modal fade"  id="ModalRespuesta"  data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloProductoRespuesta">Respuesta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<meta name="csrf-token" content="{{ csrf_token() }}">
        @include('preguntas.FormRespuestaPreguntas')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary Responder">Responder</button>
      </div>
    </div>
  </div>
</div>
<!--Temirnal modal-->