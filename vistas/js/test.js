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
		  
		  var datosEventos = new FormData();
          datosEventos.append("idEventos",respuesta["id_evento"]);

          $.ajax({

              url:"ajax/eventos.ajax.php",
              method: "POST",
              data: datosEventos,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  
                  $("#editarEventoSelected").val(respuesta["id"]);
                  $("#editarEventoSelected").html(respuesta["nombre"]);

              }

          })
      

			  
 

	  }

  	})

})

/*=============================================
ELIMINAR TEST
=============================================*/
$(".tablas").on("click", ".btnEliminarTest", function(){

	var idTest = $(this).attr("idTest");

	swal({
        title: '¿Está seguro de borrar la Pregunta?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Pregunta!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=test&idTest="+idTest;
        }

  })

})