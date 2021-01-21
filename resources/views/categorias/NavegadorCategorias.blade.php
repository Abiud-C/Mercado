	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<a class="navbar-brand"><i class="fas fa-list"></i></a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="navbarNavDropdown">
  			<ul class="navbar-nav mr-auto">
      			<li class="nav-item active">
        			<a class="nav-link" href="{{url('/')}}">Inicio <span class="sr-only">(current)</span></a>
      			</li>
      			<li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Categorías
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			        @foreach($Categoria as $cat)
			          <a class="dropdown-item item_categoria" href="{{url('inicio/'.$cat->id)}}" name="item_categoria">{{$cat->NameCate}}</a>
			        @endforeach
					</div>
			    </li>
      		</ul>
      		<form class="form-inline">
            @guest
      			<a href="#" class="mr-sm-4" id="carritoIconOut"><i class="fas fa-shopping-cart"></i></a>
            @else
            <a href="{{url('carrito/'.Auth::user()->id)}}" class="mr-sm-4" id="carritoIcon"><i class="fas fa-shopping-cart"></i></a>
            @endguest
      		</form>
  			  <form class="form-inline">
    			   <input class="form-control mr-sm-2" id="BuscarInicio"  placeholder="Buscar productos, marcas y más..." aria-label="Ingrese el producto a buscar">
    			   <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="Btn_BuscarInicio"><i class="fas fa-search"></i></button>
  			  </form>
  		</div>
	</nav>