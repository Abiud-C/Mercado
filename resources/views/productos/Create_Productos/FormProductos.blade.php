<div class="container">
  <br>
  <ul class="nav nav-tabs" id="TabProducto" role="tablist">
    <li class="nav-item" >
      <a class="nav-link active" id="DGenerales-tab" data-toggle="tab" href="#DGenerales" role="tab" aria-controls="DGenerales" aria-selected="true"><h5>Datos Generales</h5></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="Restricciones-tab" data-toggle="tab" href="#Restricciones" role="tab" aria-controls="Restricciones" aria-selected="false"><h5>Restricciones del producto</h5></a>
    </li>
  </ul>
  <div class="tab-content" id="TabContentInforme"> 
    <!--Formulario de datos generales del producto-->
    <div class="tab-pane fade show active" id="DGenerales" role="tabpanel" aria-labelledby="DGenerales-tab">
      <hr style="border-color:#212121;">
            
        @include('productos.Create_Productos.GeneralesProductos')
                
    </div>
    <!--Formulario de restricciones del producto-->
    <div class="tab-pane fade" id="Restricciones" role="tabpanel" aria-labelledby="Restricciones-tab" style="justify-content: center;">
      <hr style="border-color:#212121;">
                 
        @include('productos.Create_Productos.RestriccionesProductos')

    </div>
  </div>
</div>
  
