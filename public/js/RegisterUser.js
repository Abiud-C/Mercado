$(window).on('load', function(){ 

var NewUser,Btn_CrearUser,EditarUser,Btn_GuardarCambiosUser,Btn_ExitUser, idUser;

NewUser = $("#NewUser");
EditarUser =$(".EditarUser");
Btn_CrearUser = $("#Btn_CrearUser");
Btn_GuardarCambiosUser = $("#Btn_GuardarCambiosUser");
Btn_ExitUser = $("#Btn_ExitUser");


NewUser.on('click', changeButton);
EditarUser.on('click',getUser);
Btn_CrearUser.on('click',postUser);
Btn_GuardarCambiosUser.on('clikc',putUser);
Btn_ExitUser.on('click',Reset);

function changeButton(){
	$('#contraseña').show();
    $('#contraseña-confirm').show();
	$('#Btn_CrearUser').show();
	$('#password').show();
	$('#Btn_GuardarCambiosUser').hide();
	$('#ModalUserLabel').text('Nuevo Usuario');
	$('#tipoUser').removeAttr('disabled');
	Reset();
}

function changeButton2(){
	$('#Btn_CrearUser').hide();
	$('#Btn_GuardarCambiosUser').show();
	$('#ModalUserNew').modal('show');
	$('#ModalUserLabel').text('Actualizar Usuario');
}

function Reset() {

     $('#UserForm')[0].reset();
     $('#name').val(' ');
     $('#paterno').val(' ');
     $('#materno').val(' ');
     $('#email').val(' ');
     $('#contraseña').val(' ');
     $('#contraseña-confirm').val(' ');
     $('input').removeClass('is-invalid');
     $('input').removeClass('is-valid');
     $('input').addClass('form-control form-control-sm');
     $('#ModalUserNew').modal('hide');
}


function postUser(){
	$('#Btn_CrearUser').attr('disabled', 'disabled');
	tokenPost = $('meta[name="csrf-token"]').attr('content');
	axios.post('/users', {
	    	name:$('#name').val(),
     		paterno:$('#paterno').val(),
     		materno:$('#materno').val(),
     		email:$('#email').val(),
     		password:$('#password').val(),
     		foto:$('#foto').val(),
     		tipo:$('#tipoUser').val(),
	    	_token:tokenPost,
	    }).then(function (response) {
	    	MensajeCreate();
	    	_tbody = $("#tabla_User > tbody");
      			item  = ' <tr id="' + response.data.id + '">';
      			item += ' <td class="NameUser"><i class="far fa-user-circle"></i> ' + response.data.name +  '</td>';
      			item += ' <td style="width:370px" class="email">' + response.data.email +  '</td>';
      			item += ' <td> <button type="button" class="btn btn-success btn-sm EditarUser" id="' + response.data.id + '"><i class="far fa-edit"></i> Actualizar usuario</button> <button type="button" class="btn btn-secondary btn-sm EditarConUser" id="' + response.data.id + '"><i class="fas fa-retweet"></i> restaurar contraseña</button> </td>';
      		item  += '</tr>';
      		_tbody.append(item);
	    }).catch(function (error){
	    	console.log(error.data);
	    	$('#Btn_CrearCUser').removeAttr('disabled'); 

	    }).finally( function (response){
	    	$('#Btn_CrearUser').removeAttr('disabled');
	    	Reset(); 
	    });
}

function getUser(){
	idUser = this.id;
	$(".loader-page-get").fadeIn("slow");
	changeButton2();
    axios.get('/Registro/'+idUser+'/edit')  
    .then(function (response) {
    	$('#name').val(response.data.name);
    	$('#paterno').val(response.data.paterno);
    	$('#materno').val(response.data.materno);
    	$('#email').val(response.data.email);
    	$('#contraseña').hide();
    	$('#contraseña-confirm').hide();
    	$('#tipoUser').val(response.data.roles[0].id);
    	$('#tipoUser').attr('disabled','disabled');
     	console.log(response);
     	$(".loader-page-get").fadeOut("slow");
  	}).catch(function (error) {
  		console.log(error);
  		$(".loader-page-get").fadeOut("slow");
  		Reset();	  		
  	}); 
}

function putUser(){
	console.log(idCategoria);
	$(".loader-page-get").fadeIn("slow");
	$('#Btn_GuardarCambiosUser').attr('disabled', 'disabled');
	tokenPost = $('meta[name="csrf-token"]').attr('content');
	axios.put('/Registro/'+idUser, { 
	    	name:$('#name').val(),
     		paterno:$('#paterno').val(),
     		materno:$('#materno').val(),
     		email:$('#email').val(),	
	    	_token:tokenPost,
	    }).then(function (response) {
	    	_td1 = $("#tabla_User > tbody > #" + response.data.id + ' > td.name');
	    	_td2 = $("#tabla_User > tbody > #" + response.data.id + ' > td.email');
        	_td1.text(response.data.name);
        	_td2.text(response.data.email);        	
	    	Reset();
	    	$(".loader-page-get").fadeOut("slow");
	    }).catch(function (error){
	    	console.log(error);
	    	$(".loader-page-get").fadeOut("slow");

	    }).finally( function (response){
	    	$('#Btn_GuardarCambiosUser').removeAttr('disabled'); 
	    	$(".loader-page-get").fadeOut("slow");
	    });
}

});