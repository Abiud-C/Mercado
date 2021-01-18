<div class="shadow-lg p-3 mb-5 bg-white rounded">
	<div class="form-row">
		<div class="col-md-8 mb-3">
			<label class="col-form-label-sm" for="Nombre">Nombre del producto</label>
    		<input type="text" name="Nombre" class="form-control form-control-sm {{$errors->has('Nombre')?'is-invalid':''}}" id="Nombre" value="{{ isset($producto->Nombre)?$producto->Nombre:old('Nombre')}}">
    		{!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>') !!}
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-8 mb-3">
			<label class="col-form-label-sm" for="Descripcion">Breve descripción</label>
    		<input type="textArea" name="Descripcion" class="form-control form-control-sm {{$errors->has('Descripcion')?'is-invalid':''}}" id="Descripcion" value="{{ isset($producto->Descripcion)?$producto->Descripcion:old('Descripcion')}}">
    		{!! $errors->first('Descripcion','<div class="invalid-feedback">:message</div>') !!}
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-8 mb-3">
			<label class="col-form-label-sm" for="Caracteristicas">Caracteristicas</label>
    		<textarea type="textArea" name="Caracteristicas" class="form-control form-control-sm {{$errors->has('Caracteristicas')?'is-invalid':''}}" id="Caracteristicas" value="">
    		{{ isset($producto->Caracteristicas)?$producto->Caracteristicas:old('Caracteristicas')}}
    		</textarea >
    		{!! $errors->first('Caracteristicas','<div class="invalid-feedback">:message</div>') !!}
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-8 mb-3">
			<div class="card text-center">
		  		<div class="card-header">
		    		<label class="col-form-label-sm" for="foto">Ingresa aquí las imagenes</label>
		  		</div>
		  		<div class="card-body {{$errors->has('foto')?'border border-danger':''}}">
		  			<i class="fas fa-cloud-upload-alt"></i>
		    		<h6 class="card-title">Imagenes/Fotos</h6>
		    		@if(isset($producto->fotos))
						<br/>
						@foreach($producto->fotos as $foto)
						<img src="{{asset('storage').'/'.$foto->File_Name}}" class="img-thumbnail img-fluid" alt="" width="200">
						@endforeach
						<br/>
					@endif
					
		    		<input type="file" placeholder="Subir" class="btn btn-primary" name="foto" id="foto" value="{{ isset($foto->File_Name)?$foto->File_Name:old('foto')}}">
		    		
		  		</div>
		  		<div class="card-footer ">
		  			<label class="col-form-label-sm" for="Descripcion_foto">Descripción de la Imagen/Foto.</label>
		  			
		  			<input class="form-control form-control-sm {{$errors->has('Descripcion_foto')?'is-invalid':''}}" id="Descripcion_foto" type="text" name="Descripcion_foto" placeholder="Ej.Imagen de Deporte" value="{{ isset($foto->Descripcion)?$foto->Descripcion:old('Descripcion_foto')}}">

		  			{!! $errors->first('Descripcion_foto','<div class="invalid-feedback">:message</div>') !!}
		  			
		  		</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row justify-content-end">
      <button type="button" id="tab_restricciones"class="col-sm-2 btn btn-primary btn-sm">Siguiente</button>
    </div> 
</div>