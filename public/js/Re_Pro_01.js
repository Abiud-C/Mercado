$(window).on('load', function(){
var btn_Producto_Revision,idProductoRevisar,btn_Reset,btn_Consignar,tokenPost;

btn_Producto_Revision = $('.btn_Revision');
btn_Reset = $('.btn_Reset_Revisar');
btn_Consignar = $('#Consignar');


btn_Producto_Revision.on('click',getProducto);
btn_Reset.on('click', Reset);
btn_Consignar.on('click',putConsignacion);

function Reset() {
     $('#FormRevision')[0].reset();
     $('#ModalRevisarProductos').modal('hide');
}
function MensajeCreate(){
    const Toast = Swal.mixin({
      toast: true,
      position: 'center',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: 'success',
      title: 'Producto Consignado'
    })
}

$('#NoConsignar').click(function(){
    Swal.fire({
    title: '¿Razon por la que no fue consignado?',
    input: 'text',
    inputAttributes: {
      autocapitalize: 'on'
    },
    showCancelButton: true,
    confirmButtonText: 'Enviar',
    showLoaderOnConfirm: true,
    preConfirm: (login) => {
      return fetch(`//api.github.com/users/${login}`)
        .then(response => {
          if (!response.ok) {
            throw new Error(response.statusText)
          }
          return response.json()
        })
        .catch(error => {
          Swal.showValidationMessage(
            `Request failed: ${error}`
          )
        })
    },
    allowOutsideClick: () => !Swal.isLoading(),
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: `${result.value.login}'s avatar`,
        imageUrl: result.value.avatar_url
      })
    }
  })
});

function getProducto() {
	idProductoRevisar = this.id;
	$(".loader-page-get").fadeIn("slow");
	$('#ModalRevisarProductos').modal('show');
    axios.get('revision/productos/'+idProductoRevisar)  
    .then(function (response) {
     $('#ModalRevisarProductosLabel').text(response.data.Nombre);	
     $('#Nombre').val(response.data.Nombre);
     $('#Descripcion').val(response.data.Descripcion);
     $('#Caracteristicas').val(response.data.Caracteristicas);
     $('#Categoria').val(response.data.categoria.NameCate);
     $('#foto').attr('src','storage/'+response.data.fotos[0].File_Name);
     $('#Cantidad').val(response.data.Cantidad);
     $('#Precio').val(response.data.Precio);
     $('#Garantia').val(response.data.Garantia);
     console.log(response);
     $(".loader-page-get").fadeOut("slow");
  	})
  	.catch(function (error) {
  		if(error.response.data.exception){
        Swal.fire({
          icon: 'error',
          title: 'Nada para mostrar',
          text: 'Algo salio mal',
        })
  			$(".loader-page-get").fadeOut("slow");
  			Reset();
  		}else{
  			$(".loader-page-get").fadeOut("slow");
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
      MensajeCreate();
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
        Swal.fire({
          icon: 'error',
          title: 'Algo salio mal',
          text: 'Intentelo nuevamente',
        })
  			Reset();
  		}else{
  			$(".loader-page-get").fadeOut("slow");
  			Reset();	
  		}
  	}); 
}
	
});