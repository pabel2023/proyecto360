/*=============================================
EDITAR Testopcion
=============================================*/
$(".tablas").on("click", ".btnEditarTestopcion", function(){

	var idTestopcion = $(this).attr("idTestopcion");

	var datos = new FormData();
    datos.append("idTestopcion", idTestopcion);

    $.ajax({

      url:"ajax/testopcion.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
        $("#idTestopcion").val(respuesta["id"]);
      
	       
        $("#editarid_evento").val(respuesta["id_evento"]);
	       $("#editarid_test").val(respuesta["id_test"]); 
 
	       $("#editartexto").val(respuesta["texto"]); 
 
	       $("#editarestado").val(respuesta["estado"]); 
 

	  }

  	})

})

/*=============================================
ELIMINAR TESTOPCION
=============================================*/
$(".tablas").on("click", ".btnEliminarTestopcion", function(){

	var idTestopcion = $(this).attr("idTestopcion");
	
	swal({
        title: '¿Está seguro de borrar la Respuesta?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Respuesta!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=testopcion&idTestopcion="+idTestopcion;
        }

  })

})