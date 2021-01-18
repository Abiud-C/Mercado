
	<div class="card">
		<div class="card-header justify-content-between">
            <div class="d-flex justify-content-between">
                <h6>{{ __('Mostrando Categorias') }}</h6>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalCategoria" id="Btn_NuevaCat">
  					<i class="far fa-plus-square"></i>Nueva categoria
				</button>
            </div>
        </div>
        <div class="card-body">
        	<div class="table-responsive">
				<table class="table center text-center table-sm" id="tabla_categoria">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col"></th>
				      <th scope="col">Nombre</th>
				      <th style="width:370px" scope="col">Descripción</th>
				      <th scope="col">Acciones</th>
				      <th scope="col">Estatus</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($Categoria as $cate)
				    <tr id="{{$cate->id}}">
				      <td><i class="fas fa-puzzle-piece"></i></td>
				      <td class="NameCate">{{$cate->NameCate}}</td>
				      <td style="width:370px" class="Description">{{$cate->Description}}</td>
				      <td>
				      	<button type="button" class="btn btn-success btn-sm EditarCat" id="{{$cate->id}}"><i class="far fa-edit"></i></button>
						<button type="button" class="btn btn-danger btn-sm EliminarCat" id="{{$cate->id}}" ><i class="far fa-trash-alt"></i></button>
				      </td>
				      <td class="Status">
						@if($cate->Status == 1)
						<label class="col-form-label-sm" for="Status">Activo</label>
						@else
						<label class="col-form-label-sm" for="Status">Inactivo</label>
						@endif
				      </td>
				    </tr>
				    @endforeach
				  </tbody>
				</table>
			</div>
        </div>
	</div>


<!--Modal-->
<div class="modal fade" id="ModalCategoria" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nueva categoria</h5>
        <button type="button" class="close Btn_Exit" name="Btn_Exit" id="Btn_Exit" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="" action="" id="CategoriaForm">
        		<meta name="csrf-token" content="{{ csrf_token() }}">
			    @include('categorias.FormCategorias')
		</form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" id="Btn_CrearCat">Crear</button>
      	<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" id="Btn_GuardarCambiosCat">Guardar Cambios</button>
        <button type="button" class="btn btn-outline-secondary btn-sm Btn_Exit" data-dismiss="modal" name="Btn_Exit" id="Btn_Exit">Cancelar</button>
      </div>
    </div>
  </div>
</div>

