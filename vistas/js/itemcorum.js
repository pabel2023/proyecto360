/*=============================================
EDITAR ItemCorum
=============================================*/
$(".tablas").on("click", ".btnEditarItemCorum", function(){

	var idItemCorum = $(this).attr("idItemCorum");

	var datos = new FormData();
    datos.append("idItemCorum", idItemCorum);

    $.ajax({

      url:"ajax/itemcorum.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	   $("#idItemCorum").val(respuesta["id"]);
		   $("#editarid_evento").val(respuesta["id_evento"]);
	       $("#editarnombre").val(respuesta["nombre"]);
		   $("#editartipo").val(respuesta["tipo"]);
		   $("#editarporcentage").val(respuesta["porcentage"]);
	       $("#editardocumento_encargado").val(respuesta["documento_encargado"]);
		   $("#editarnombre_encargado").val(respuesta["nombre_encargado"]);
		   $("#editarestado").val(respuesta["estado"]);
	       
	  }

  	})

})

/*=============================================
ELIMINAR ITEMCORUM
=============================================*/
$(".tablas").on("click", ".btnEliminarItemCorum", function(){

	var idItemCorum = $(this).attr("idItemCorum");
	
	swal({
        title: 'Â¿EstÃ¡ seguro de borrar el ItemCorum?',
        text: "Â¡Si no lo estÃ¡ puede cancelar la acciÃ³n!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar ItemCorum!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=itemcorum&idItemCorum="+idItemCorum;
        }

  })

})