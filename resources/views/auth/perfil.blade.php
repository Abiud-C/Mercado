<div class="container">
	<div class="card">
	  <div class="card-header text-center">
	  	<div class="row justify-content-between">
	  		<h6>Datos Personales</h6>
	  		<a class="btn btn-light"><i class="fas fa-user-edit"></i>Actualizar datos</a>
	  	</div>
	  </div>
	  <div class="card-body">
	  	<div class="row">
	  		<div class="col-md-4">
	  			<img src="{{asset('storage').'/'.$Usuario->foto}}" class="rounded float-left img-fluid" alt="..." width="200" height="200">
	  		</div>
	  		<div class="col">
	  			<div class="form-row">
	  				<div class="form-group col-md-6">
				    	<h6>Nombre</h6>
				        <label class="col-form-label-sm">
				        	{{$Usuario->name}} {{$Usuario->paterno}} {{$Usuario->materno}}
				        </label>
				    </div>
				    <div class="form-group col-md-6">
				        <h6>Correo</h6>
				        <label class="col-form-label-sm text-primary">
				        	{{$Usuario->email}}
				        </label>
				    </div>
	  			</div>	
	  			<div class="form-row">
	  				<div class="form-group col-md-6">
				    	<h6>Usuario desde</h6>
				        <label class="col-form-label-sm">
				        	 {{$Usuario->created_at}}
				        </label>
				    </div>
				    <div class="form-group col-md-6">
				    	<h6>Tipo de usuario</h6>
				        <label class="col-form-label-sm">
				        	 Vendedor/Comprador
				        </label>
				    </div>
	  			</div>	
	  			<hr>
	  			<div class="form-row">
	  				<div class="form-group col-md-6">
				    	<h6>Productos consigandos</h6>
				        <label class="col-form-label-sm">
				        	 
				        </label>
				    </div>
				    <div class="form-group col-md-6">
				    	<h6>Ventas realizadas</h6>
				        <label class="col-form-label-sm">
				        	 
				        </label>
				    </div>
	  			</div>	
	  		</div>
	  	</div>
	  </div>
	</div>
</div>