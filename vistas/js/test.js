/*=============================================
EDITAR Test
=============================================*/
$(".tablas").on("click", ".btnEditarTest", function(){

	var idTest = $(this).attr("idTest");

	var datos = new FormData();
    datos.append("idTest", idTest);

    $.ajax({

      url:"ajax/test.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
        
	       $("#editarId").val(respuesta["id"]); 
 
	       $("#editarId_evento").val(respuesta["id_evento"]); 
 
	       $("#editarTexto").val(respuesta["texto"]); 
 
	       $("#editarTipo").val(respuesta["tipo"]); 
 
	       $("#editarEstado").val(respuesta["estado"]); 
 

	  }

  	})

})

/*=============================================
ELIMINAR TEST
=============================================*/
$(".tablas").on("click", ".btnEliminarTest", function(){

	var idTest = $(this).attr("idTest");
	
	swal({
        title: '¿Está seguro de borrar el Test?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Test!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=test&idTest="+idTest;
        }

  })

})