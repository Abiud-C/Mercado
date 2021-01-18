  <div class="form-row">
    <div class="form-group col-md-6">
      <label class="col-form-label-sm" for="NameCate">Nombre de la categoria</label>
      <input type="text" class="form-control form-control-sm" id="NameCate" value="" name="NameCate" aria-describedby="NameCategoria">
        <small id="emailHelp" class="form-text text-muted">El nombre debe ser acorde a los productos</small>
      <span class="invalid-feedback" role="alert">
        <strong></strong>
      </span>  
    </div>
    <div class="form-group col-md-6">
      <label class="col-form-label-sm" for="Status">Estado</label>
      <select class="form-control form-control-sm" id="Status" name="Status">
        <option selected  value="">Seleccione una opción</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option> 
      </select>
        <span class="invalid-feedback" role="alert">
          <strong></strong>
        </span>
    </div>
  </div>
  <div class="form-group">
    <label class="col-form-label-sm" for="Description">Descripción</label>
    <textarea class="form-control form-control-sm" id="Description" name="Description" aria-label="With textarea"></textarea>
      <span class="invalid-feedback" role="alert">
        <strong></strong>
      </span>
  </div>
  