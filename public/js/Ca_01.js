$(window).on('load', function(){ 
     
var btn_NuevaCat,btn_CrearCat, btn_ChangeCat, btn_CancelarCat;
var btn_Reset,btn_EditCat,ModalCat, idCategoria,btn_EliminarCat;
var idCategoria,tokenPost;

btn_NuevaCat = $('#Btn_NuevaCat');
btn_CrearCat = $('#Btn_CrearCat');
btn_ChangeCat = $('#Btn_GuardarCambiosCat');
btn_Reset = $('.Btn_Exit');
btn_EditCat = $('.EditarCat');
ModalCat = $('#ModalCategoria');
btn_EliminarCat =$('.EliminarCat');

btn_NuevaCat.on('click', changeButton);
btn_Reset.on('click', Reset);
btn_EditCat.on('click',getCategoria);
btn_CrearCat.on('click',postCategoria);
btn_ChangeCat.on('click',putCategoria);
btn_EliminarCat.on('click',deletCategoria);

$(".loader-page").fadeOut("slow");

function changeButton(){
	$('#Btn_CrearCat').show();
	$('#Btn_GuardarCambiosCat').hide();
	$('#staticBackdropLabel').text('Nueva Categoria');
}

function changeButton2(){
	$('#Btn_CrearCat').hide();
	$('#Btn_GuardarCambiosCat').show();
	$('#ModalCategoria').modal('show');
	$('#staticBackdropLabel').text('Actualizar Categoria');
}

function Reset() {
     $('#CategoriaForm')[0].reset();
     $('input').removeClass('is-invalid');
     $('input').removeClass('is-valid');
     $('input').addClass('form-control form-control-sm');
     $('#ModalCategoria').modal('hide');
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

function postCategoria(){
	$('#Btn_CrearCat').attr('disabled', 'disabled');
	tokenPost = $('meta[name="csrf-token"]').attr('content');
	axios.post('/categorias', {
	    	NameCate:$('#NameCate').val(),
     		Description:$('#Description').val(),
     		Status:$('#Status').val(),
	    	_token:tokenPost,
	    }).then(function (response) {
	    	MensajeCreate();
	    	_tbody = $("#tabla_categoria > tbody");
      			item  = ' <tr id="' + response.data.id + '">';
      			item += ' <td><i class="fas fa-puzzle-piece"></i></td>';
      			item += ' <td class="NameCate">' + response.data.NameCate +  '</td>';
      			item += ' <td class="Description">' + response.data.Description +  '</td>';
      			item += ' <td> <button type="button" class="btn btn-success btn-sm EditarCat" id="' + response.data.id + '"><i class="far fa-edit"></i></button> <button type="button" class="btn btn-danger btn-sm EliminarCat" id="' + response.data.id + '"><i class="far fa-trash-alt"></i></button> </td>';
      		if(response.data.Status == 1) {
         		item += ' <td class="Status"><label class="col-form-label-sm" for="Status">Activo</label></td>';
       		}else {
        		item += ' <td class="Status"><label class="col-form-label-sm" for="Status">Inactivo</label></td>';
       		}
      		item  += '</tr>';
      		_tbody.append(item);
	    }).catch(function (error){
	    	console.log(error.data);
	    	$('#Btn_CrearCat').removeAttr('disabled'); 

	    }).finally( function (response){
	    	$('#Btn_CrearCat').removeAttr('disabled');
	    	Reset(); 
	    });
}

function getCategoria(){
	idCategoria = this.id;
	$(".loader-page-get").fadeIn("slow");
	$('#Btn_CrearCat').hide();
	$('#Btn_GuardarCambiosCat').show();
	$('#staticBackdropLabel').text('Actualizar Categoria');
	$('#ModalCategoria').modal('show');
    axios.get('/categorias/'+idCategoria+'/edit')  
    .then(function (response) {
     $('#NameCate').val(response.data.NameCate);
     $('#Description').val(response.data.Description);
     $('#Status').val(response.data.Status);
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

function putCategoria(){
	console.log(idCategoria);
	$(".loader-page-get").fadeIn("slow");
	$('#Btn_GuardarCambiosCat').attr('disabled', 'disabled');
	tokenPost = $('meta[name="csrf-token"]').attr('content');
	axios.put('/categorias/'+idCategoria, { 
	    	NameCate:$('#NameCate').val(),
     		Description:$('#Description').val(),
     		Status:$('#Status').val(),
	    	_token:tokenPost,
	    }).then(function (response) {
	    	_td1 = $("#tabla_categoria > tbody > #" + response.data.id + ' > td.NameCate');
	    	_td2 = $("#tabla_categoria > tbody > #" + response.data.id + ' > td.Description');
	    	_td3 = $("#tabla_categoria > tbody > #" + response.data.id + ' > td.Status > label');
        	_td1.text(response.data.NameCate);
        	_td2.text(response.data.Description);
        	if(response.data.Status == 1){
        		_td3.text('Activo');
        	}else{
        		_td3.text('Inactivo');
        	}
        	
	    	Reset();
	    	$(".loader-page-get").fadeOut("slow");
	    	
	    }).catch(function (error){
	    	console.log(error);
	    	$(".loader-page-get").fadeOut("slow");

	    }).finally( function (response){
	    	$('#Btn_GuardarCambiosCat').removeAttr('disabled'); 
	    	$(".loader-page-get").fadeOut("slow");
	    });
}

function deletCategoria(){
	idCategoria = this.id;
	console.log(idCategoria);
	$(".loader-page-get").fadeIn("slow");
	$('.EliminarCat').attr('disabled', 'disabled');

	axios.delete('/categorias/'+idCategoria)
    .then(function (response) {
      _tr = $("#tabla_categoria > tbody > #" + response.data.id); 
      _tr.remove();
      $(".loader-page-get").fadeOut("slow");
    })
    .catch(function (error) {
      console.log(error);
      $(".loader-page-get").fadeOut("slow");
      $('.EliminarCat').removeAttr('disabled'); 
      alert(error.response.data);
    }).finally( function (response){
	    	$('.EliminarCat').removeAttr('disabled'); 
	    	$(".loader-page-get").fadeOut("slow");
	 });
	
}


});
