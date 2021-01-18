$(document).ready(function(){
	$('#BuscarInicio').autocomplete({
		source:function(request, response){
			axios.get('/Buscar/inicio',{	
				data: request,
			})  
    		.then(function (request) {
    			console.log(request);
    			response(request.data)
  			})
  			.catch(function (error) {
  				console.log(error);
  			});   
		},
		minLenght:1,
		select:function(event, ui){
			alert("Selecciono:"+ui.item.label);
		}
	});
});