<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label col-form-label-sm text-md-right">{{ __('Nombre') }}</label>
    <div class="col-md-6">
        <input id="name" type="text" class="form-control form-control-sm" name="name" value="" required autocomplete="name" autofocus>
        <span class="invalid-feedback" role="alert">
            <strong></strong>
        </span>
    </div>
</div>

<div class="form-group row">
    <label for="paterno" class="col-md-4 col-form-label col-form-label-sm text-md-right">{{ __('Apellido paterno') }}</label>
    <div class="col-md-6">
        <input id="paterno" type="text" class="form-control form-control-sm" name="paterno" value="" required autocomplete="name" autofocus>
        <span class="invalid-feedback" role="alert">
            <strong></strong>
        </span>
    </div>
</div>

<div class="form-group row">
    <label for="materno" class="col-md-4 col-form-label col-form-label-sm text-md-right">{{ __('Apellido materno') }}</label> 
    <div class="col-md-6">
        <input id="materno" type="text" class="form-control form-control-sm" name="materno" value="" required autocomplete="name" autofocus>
        <span class="invalid-feedback" role="alert">
            <strong></strong>
        </span>
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label col-form-label-sm text-md-right">{{ __('Correo') }}</label>
    <div class="col-md-6">
        <input id="email" type="email" class="form-control form-control-sm" name="email" value="" required autocomplete="email">
        <span class="invalid-feedback" role="alert">
            <strong></strong>
        </span>
    </div>
</div>

<div class="form-group row">
    <label for="tipoUser" class="col-md-4 col-form-label col-form-label-sm text-md-right">{{ __('Tipo de usuario') }}</label>
    <div class="col-md-6">
        <select class="form-control form-control-sm" id="tipoUser">
        @foreach($Tipo as $tipo)
            <option value="{{$tipo->id}}">{{$tipo->Nombre}}</option>
        @endforeach
        </select>
        <span class="invalid-feedback" role="alert">
            <strong></strong>
        </span>
    </div>
</div>

<div class="form-group row" id="contraseña">
    <label for="password" class="col-md-4 col-form-label col-form-label-sm text-md-right">{{ __('Contraseña') }}</label>
    <div class="col-md-6">
        <input id="password" type="password" class="form-control form-control-sm" name="password" required autocomplete="new-password">
        <span class="invalid-feedback" role="alert">
            <strong></strong>
        </span>
    </div>
</div>

<div class="form-group row" id="contraseña-confirm">
    <label for="password-confirm" class="col-md-4 col-form-label col-form-label-sm text-md-right">{{ __('Confirmar contraseña') }}</label>
    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>
<!--div class="form-group row">
    <label for="foto" class="col-md-4 col-form-label col-form-label-sm text-md-right">{{ __('Foto de perfil') }}</label>
    <div class="col-md-6">
        <div class="card text-center">
            <i class="fas fa-cloud-upload-alt"></i>
            <h6 class="card-title">Imagenes/Fotos</h6>
            <br/>
                <img src="" class="img-thumbnail img-fluid" alt="" width="200">
            <br/>                        
            <input type="file" placeholder="Subir" class="btn btn-primary" name="foto" id="foto" value="">
        </div>
    </div>
</div-->
