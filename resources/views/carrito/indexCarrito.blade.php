@extends('layouts.app')
@section('content')
<div class="loader-page-get" style="display: none;"></div>
<div class="container-sm"><!--este uso-->
  <!--ubicación-->
  <h5>Carrito de compra <i class="fas fa-shopping-cart"></i></h5>
  <br>
  <!--fin de la ubicación-->
  <div class="shadow-lg p-3 mb-5 bg-white rounded">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Producto</th>
          <th scope="col">Precio</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection