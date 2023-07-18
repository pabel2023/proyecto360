/*=============================================
EDITAR Eventos
=============================================*/
$(".tablas").on("click", ".btnEditarEventos", function(){

	var idEventos = $(this).attr("idEventos");

	var datos = new FormData();
    datos.append("idEventos", idEventos);

    $.ajax({

      url:"ajax/eventos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
        $("#idEventos").val(respuesta["id"]);     
	       
 
	       $("#editarnombre").val(respuesta["nombre"]); 
 
	       $("#editarfecha").val(respuesta["fecha"]); 
 
	       $("#editarfecha_ini").val(respuesta["fecha_ini"]); 
 
	       $("#editarfecha_fin").val(respuesta["fecha_fin"]); 
 
	       $("#editarhora_ini").val(respuesta["hora_ini"]); 
 
	       $("#editarhora_fin").val(respuesta["hora_fin"]); 
 
	       $("#editarestado").val(respuesta["estado"]); 
         $("#editarestado").html(respuesta["estado"]);
 

	  }

  	})

})

/*=============================================
ELIMINAR EVENTOS
=============================================*/
$(".tablas").on("click", ".btnEliminarEventos", function(){

	var idEventos = $(this).attr("idEventos");
	
	swal({
        title: '¿Está seguro de borrar la Asamblea?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Asamblea!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=eventos&idEventos="+idEventos;
        }

  })

})