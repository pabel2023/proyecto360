/*=============================================
EDITAR Vieventos
=============================================*/
$(".tablas").on("click", ".btnEditarVieventos", function(){

	var idVieventos = $(this).attr("idVieventos");	
	var datos = new FormData();
    datos.append("idVieventos", idVieventos);
    

    $.ajax({
		
      url:"ajax/vieventos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){ 

		      
      
	       $("#editarnombre").val(respuesta["nombre"]); 
 
	       $("#editarcodigo").val(respuesta["codigo"]); 
 
	       $("#editarcoeficiente_inactivo").val(respuesta["coeficiente_inactivo"]); 
 
	       $("#editarcoeficiente_activo").val(respuesta["coeficiente_activo"]); 
 
	       $("#editarcoeficiente_total").val(respuesta["coeficiente_total"]); 
 

	  }

  	})

})

/*=============================================
ELIMINAR VIEVENTOS
=============================================*/
$(".tablas").on("click", ".btnEliminarViEventos", function(){
	var valorA = $(this).attr("valorA");
	var valorB = $(this).attr("valorB");
	//alert(idVieventos);
	window.location = "index.php?ruta=vieventos&valorA="+valorA+"&valorB="+valorB;	


})