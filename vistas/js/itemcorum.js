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
        title: '¿Estas seguro de borrar el Quorum?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Quorum!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=itemcorum&idItemCorum="+idItemCorum;
        }

  })

})