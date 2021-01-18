$(window).on('load', function(){
var btn_Producto_Revision,idProductoVenta,btn_Reset,btn_Consignar,tokenPost;

btn_Producto_Revision = $('.btn_Comprar');
btn_Reset = $('.btn_Reset_Revisar');
btn_Consignar = $('#Consignar');


btn_Producto_Revision.on('click',getProducto);
btn_Reset.on('click', Reset);
btn_Consignar.on('click',putConsignacion);

function Reset() {
     $('#FormVenta')[0].reset();
     $('#ModalVentaProductos').modal('hide');
}

function getProducto() {
	idProductoVenta = this.id;
	$(".loader-page-get").fadeIn("slow");
	$('#ModalVentaProductos').modal('show');
    axios.get('/productos/'+idProductoVenta)  
    .then(function (response) {
     $('#ModalVentaProductosLabel').text(response.data.Nombre);	
     $('#Descripcion').text(response.data.Descripcion);
     $('#Caracteristicas').val(response.data.Caracteristicas);
     $('#foto').attr('src','storage/'+response.data.foto);
     $('#Cantidad').text(response.data.Cantidad);
     $('#Precio').text('$ '+response.data.Precio+'.00');
     $('#Garantia').text(response.data.Garantia);
     //$('#Categoria').val(response.data.Categoria);
     console.log(response);
     $(".loader-page-get").fadeOut("slow");
  	})
  	.catch(function (error) {
  		if(error.response.data.exception){
  			$(".loader-page-get").fadeOut("slow");
        console.log(error.data);
  			Reset();
  		}else{
  			$(".loader-page-get").fadeOut("slow");
        if(error.response.data.message){
          alert('Inicia sesión o registrate')
        }
        console.log(error.response.data.message);
  			Reset();	
  		}
  	}); 
}

function putConsignacion() {
	$(".loader-page-get").fadeIn("slow");
	tokenPost = $('meta[name="csrf-token"]').attr('content');
    axios.put('/EstatusProducto/'+idProductoRevisar,{
     	Estatus:1,
     	_token:tokenPost,
    }).then(function (response) {
      _tr = $("#tabla_producto > tbody > #" + response.data); 
      _tr.remove();
     	$('#ModalRevisarProductos').modal('hide');
      $(".loader-page-get").fadeOut("slow");
     	console.log(response);
     	$(".loader-page-get").fadeOut("slow");
  	})
  	.catch(function (error) {
  		if(error.response.data.exception){
  			$(".loader-page-get").fadeOut("slow");
  			Reset();
  		}else{
  			$(".loader-page-get").fadeOut("slow");
  			Reset();	
  		}
  	}); 
}
	
});