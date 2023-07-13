<?php

class ControladorTestopcion{

	/*=============================================
	CREAR TESTOPCION
	=============================================*/

	static public function ctrCrearTestopcion(){
		                
		if(isset($_POST["nuevatexto"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevatexto"])){

				$tabla ="testopcion";

				$datos = array("id"=>$_POST["nuevaid"],
				"id_evento"=>$_POST["nuevaid_evento"],
				"id_test"=>$_POST["nuevaid_test"],
				"texto"=>$_POST["nuevatexto"],
				"estado"=>$_POST["nuevaestado"]);

				$respuesta = ModeloTestopcion::mdlIngresarTestopcion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: " Testopcion ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "testopcion";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡ Testopcion no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "testopcion";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR Testopcion
	=============================================*/

	static public function ctrMostrarTestopcion($item, $valor){

		$tabla = "testopcion";

		$respuesta = ModeloTestopcion::mdlMostrarTestopcion($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR TESTOPCION
	=============================================*/

	static public function ctrEditarTestopcion(){

		if(isset($_POST["editartexto"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editartexto"])){

				$tabla = "testopcion";

				$datos = array("id"=>$_POST["idTestopcion"],
				"id_evento"=>$_POST["editarid_evento"],
				"id_test"=>$_POST["editarid_test"],
				"texto"=>$_POST["editartexto"],
				"estado"=>$_POST["editarestado"]);

				$respuesta = ModeloTestopcion::mdlEditarTestopcion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: " Testopcion ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "testopcion";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Testopcion no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "testopcion";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR TESTOPCION
	=============================================*/

	static public function ctrBorrarTestopcion(){

		if(isset($_GET["idTestopcion"])){

				$tabla ="testopcion";
				$datos = $_GET["idTestopcion"];

				$respuesta = ModeloTestopcion::mdlBorrarTestopcion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "La Testopcion ha sido borrada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "testopcion";

										}
									})

						</script>';
				}

		}
		
	}
}
