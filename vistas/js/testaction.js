/*=============================================
EDITAR Testaction
=============================================*/
$(".tablas").on("click", ".btnEditarTestaction", function(){

	var idTestaction = $(this).attr("idTestaction");

	var datos = new FormData();
    datos.append("idTestaction", idTestaction);

    $.ajax({

      url:"ajax/testaction.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
        $("#idTestaction").val(respuesta["id"]);
      
 
	       $("#editarid_evento").val(respuesta["id_evento"]); 
 
	       $("#editarid_text").val(respuesta["id_text"]); 
 
	       $("#editarid_test_opcion").val(respuesta["id_test_opcion"]); 
 

	  }

  	})

})

/*=============================================
ELIMINAR TESTACTION
=============================================*/
$(".tablas").on("click", ".btnEliminarTestaction", function(){

	var idTestaction = $(this).attr("idTestaction");
	
	swal({
        title: '¿Está seguro de borrar la Votacion?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Votacion!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=testaction&idTestaction="+idTestaction;
        }

  })

})