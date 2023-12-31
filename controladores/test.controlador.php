<?php

class ControladorTest{

	/*=============================================
	CREAR TEST
	=============================================*/

	static public function ctrCrearTest(){

		if(isset($_POST["nuevaTexto"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaTexto"])){

				$tabla = "test";

				$datos = array(
				"id_evento"=>$_POST["nuevaEvento"],
				"texto"=>$_POST["nuevaTexto"],
				"tipo"=>$_POST["nuevaTipo"],
				"estado"=>$_POST["nuevaEstado"]
);

				$respuesta = ModeloTest::mdlIngresarTest($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: " La pregunta ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "test";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡ La pregunta no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "test";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR Test
	=============================================*/

	static public function ctrMostrarTest($item, $valor){

		$tabla = "test";

		$respuesta = ModeloTest::mdlMostrarTest($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR TEST
	=============================================*/

	static public function ctrEditarTest(){

		if(isset($_POST["editarTexto"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTexto"])){

				$tabla = "test";

				$datos = array("id"=>$_POST["editarId"],
				"id_evento"=>$_POST["editarEvento"],
				"texto"=>$_POST["editarTexto"],
				"tipo"=>$_POST["editarTipo"],
				"estado"=>$_POST["editarEstado"]
);

				$respuesta = ModeloTest::mdlEditarTest($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: " La pregunta ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "test";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La pregunta no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "test";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR TEST
	=============================================*/

	static public function ctrBorrarTest(){

		if(isset($_GET["idTest"])){

				$tabla ="test";
				$datos = $_GET["idTest"];

				$respuestaTestaction = ModeloTestaction::mdlMostrarTestaction("Testaction","id_test", $datos);

				if(!$respuestaTestaction){

				$respuesta = ModeloTest::mdlBorrarTest($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "La pregunta ha sido borrada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "test";

										}
									})

						</script>';
				}

			}else{

				echo'<script>

				 swal({
					 type: "error",
					 title: "¡No se puede eliminar, asocioado a un pregunta!",
					 showConfirmButton: true,
					 confirmButtonText: "Cerrar"
				   }).then(function(result){
					 if (result.value) {

						 window.location = "test";

						}
				   })
			  </script>';	
			}

		}
		
	}
}
