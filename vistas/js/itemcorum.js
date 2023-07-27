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
		   $("#editarid_evento").val(respuesta["0","id_evento"]);
	     $("#editarnombre").val(respuesta["nombre"]);
		   $("#editartipo").val(respuesta["tipo"]);
		   $("#editarporcentage").val(respuesta["porcentage"]);
       $("#editardocumento_titular").val(respuesta["documento_titular"]);
		   $("#editarnombre_titular").val(respuesta["nombre_titular"]);
       $("#editarapellido_titular").val(respuesta["apellido_titular"]);
	     $("#editardocumento_encargado").val(respuesta["documento_encargado"]);
		   $("#editarnombre_encargado").val(respuesta["nombre_encargado"]);
       $("#editarapellido_encargado").val(respuesta["apellido_encargado"]);
		   $("#editarestado").val(respuesta["estado"]);
       $("#editarestado").html(respuesta["estado"]);
	       
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

/*=============================================
ACTIVAR ItemCorum
=============================================*/
$(".tablas").on("click", ".btnActivar", function(){

	var idItemCorum = $(this).attr("idItemCorum");
	var estadoItemCorum = $(this).attr("estadoItemCorum");

	var datos = new FormData();
 	datos.append("activarId", idItemCorum);
  	datos.append("activarItemCorum", estadoItemCorum);

  	$.ajax({

	  url:"ajax/itemcorum.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      		if(window.matchMedia("(max-width:767px)").matches){

	      		 swal({
			      title: "El itemcorum ha sido actualizado",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    }).then(function(result) {
			        if (result.value) {

			        	window.location = "itemcorum";

			        }


				});

	      	}

      }

  	})

  	if(estadoItemCorum == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoItemCorum',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoItemCorum',0);

  	}

})