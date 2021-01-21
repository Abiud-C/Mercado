
	<div class="card">
		<div class="card-header justify-content-between">
            <div class="d-flex justify-content-between">
                <h6>{{ __('Todos los usuarios') }}</h6>
            </div>
        </div>
        <div class="card-body">
        	<div class="table-responsive">
				<table class="table center text-center table-sm" id="tabla_User">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Nombre</th>
				      <th style="width:370px" scope="col">Correo</th>
				      <th scope="col">Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($Users as $user)
				    <tr id="{{$user->id}}">
				      <td class="NameUser"><i class="far fa-user-circle"></i> {{$user->name}}</td>
				      <td style="width:370px" class="email">{{$user->email}}</td>
				      <td>
				      	<button type="button" class="btn btn-success btn-sm EditarUser" id="{{$user->id}}"><i class="far fa-edit"></i> Actualizar usuario</button>

				      	<button type="button" class="btn btn-secondary btn-sm EditarConUser" id="{{$user->id}}"><i class="fas fa-retweet"></i> restaurar contraseña</button>
				      </td>
				    </tr>
				    @endforeach
				  </tbody>
				</table>
			</div>
        </div>
	</div>


<!--Modal-->
<div class="modal fade" id="ModalUserNew" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalUserLabel">Nueva usuario</h5>
        <button type="button" class="close Btn_Exit" name="Btn_Exit" id="Btn_Exit" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="" action="" id="UserForm">
        		<meta name="csrf-token" content="{{ csrf_token() }}">
			    @include('auth.FormUser')
		</form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" id="Btn_CrearUser">Crear usuario</button>
      	<button type="button" class="btn btn-primary btn-sm" id="Btn_GuardarCambiosUser">Guardar Cambios</button>
        <button type="button" class="btn btn-outline-secondary btn-sm Btn_Exit" data-dismiss="modal" name="Btn_Exit" id="Btn_ExitUser">Cancelar</button>
      </div>
    </div>
  </div>
</div>
