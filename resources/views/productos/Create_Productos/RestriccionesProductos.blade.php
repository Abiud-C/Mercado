<div class="shadow-lg p-3 mb-5 bg-white rounded">
	<div class="form-row">
		<div class="col">
			<div class="form-row">
				<div class="col-md-10 mb-3">
					<label class="col-form-label-sm" for="Categoria">Categoría</label>
    				<div class="mb-3">
						<div class="input-group input-group-sm">
			      		<div class="input-group-prepend">
			        		<span class="input-group-text"><i class="fas fa-puzzle-piece"></i></span>
			      		</div>
			      		<select name="Categoriaid" class="custom-select custom-select-sm {{$errors->has('Categoriaid')?'is-invalid':''}}"  id="Categoriaid" required>
			      			<option value="{{isset($producto->categoria->NameCate)?$producto->categoria->id:''}}" selected>{{isset($producto->categoria->NameCate)?$producto->categoria->NameCate:old('Categoriaid')}}</option>
			      			@isset($categoria)
            					@foreach($categoria as $Cat)
            					<option  value="{{$Cat->id}}">{{$Cat->NameCate}}</option>
            					@endforeach
          					@endisset						 
						</select>
			    		</div>
					</div>
			  		{!! $errors->first('Categoriaid','<div class="invalid-feedback">:message</div>') !!}
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-10 mb-3">
					<label class="col-form-label-sm" for="Garantia">Garantia del producto</label>
    				<div class="mb-3">
						<div class="input-group input-group-sm">
			      		<div class="input-group-prepend">
			        		<span class="input-group-text"><i class="far fa-handshake"></i></span>
			      		</div>
			      		<input name="Garantia" type="text" class="form-control form-control-sm {{$errors->has('Garantia')?'is-invalid':''}}" id="Garantia" value="{{ isset($producto->Garantia)?$producto->Garantia:old('Garantia')}}">
			    		</div>
					</div>
			  		{!! $errors->first('Garantia','<div class="invalid-feedback">:message</div>') !!}
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-5 mb-3">
					<label class="col-form-label-sm" for="Precio">Precio unitario</label>
					<div class="mb-3">
						<div class="input-group input-group-sm">
			      		<div class="input-group-prepend">
			        		<span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
			      		</div>
			      		<input type="text" name="Precio" class="form-control form-control-sm {{$errors->has('Precio')?'is-invalid':''}}" id="Precio" value="{{ isset($producto->Precio)?$producto->Precio:old('Precio')}}">
			  			</div>
					</div>
					{!! $errors->first('Precio','<div class="invalid-feedback">:message</div>') !!}
				</div>
				<div class="col-md-5 mb-3">
					<label class="col-form-label-sm" for="Cantidad">Lote de:</label>
					<div class="mb-3">
						<div class="input-group input-group-sm">
			      		<div class="input-group-prepend">
			        		<span class="input-group-text"><i class="fas fa-cubes"></i></span>
			      		</div>
    			  		<input type="text" class="form-control form-control-sm {{$errors->has('Cantidad')?'is-invalid':''}}" name="Cantidad" id="Cantidad" value="{{ isset($producto->Cantidad)?$producto->Cantidad:old('Cantidad')}}">
    					</div>
    				</div>
    				{!! $errors->first('Cantidad','<div class="invalid-feedback">:message</div>') !!}
				</div>
			</div>
			<br>
    	</div>
    	<div class="col-md-5">
    		<div class="card text-center">
		  		<div class="card-body">
		    		<img src="/img/Logo-TuxMercado.png" width="180" height="40">
		    		<h5>Recuerda llenar los datos correctamente, esto ayudara a que tu producto se pocisione mejor.</h5>
		  		</div>
			</div>
    	</div>
	</div>
	<div class="form-row justify-content-between">
		<button type="button" id="tab_generales"class="col-sm-2 btn btn-secondary btn-sm">Aterior</button>
		<div class="col-sm-4">
			<div class="form-row justify-content-between">
				<div class="col">
					<a type="button" href="{{url('Cliente')}}" id="btn_CanecalarPro"class="btn btn-outline-secondary btn-sm btn-block">Cancelar</a>
				</div>
				<div class="col">
					<input type="submit" type="button" class="btn btn-primary btn-sm btn-block" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}">
				</div>
			</div>
		</div>
    </div> 
</div>