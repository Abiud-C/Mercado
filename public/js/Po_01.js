$(window).on('load', function(){
var btn_tab_restricciones,btn_back_tab_DGenerales;
btn_tab_restricciones =$('#tab_restricciones');
btn_back_tab_DGenerales=$('#tab_generales')

btn_tab_restricciones.on('click',ValidarGenerales);
btn_back_tab_DGenerales.on('click',TabGenerales);

/*Dropzone.options.myAwesomeDropzone = {
    paramName: "file_Name", // Las imágenes se van a usar bajo este nombre de parámetro
    maxFilesize: 2, // Tamaño máximo en MB
};*/


function TabGenerales(){
	$('#TabProducto a[href="#DGenerales"]').tab('show');
}

function TabRestricciones(){
	$('#TabProducto a[href="#Restricciones"]').tab('show');	
}


function ValidarGenerales(){
	 TabRestricciones();
} 



});