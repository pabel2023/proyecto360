<?php

class ControladorTestaction{

	/*=============================================
	CREAR TESTACTION
	=============================================*/

	static public function ctrCrearTestaction(){

		if(isset($_POST["nuevaid_evento"])){



				$tabla ="testaction";

				$datos = array(
				"id_evento"=>$_POST["nuevaid_evento"],
				"id_text"=>$_POST["nuevaid_text"],
				"id_test_opcion"=>$_POST["nuevaid_test_opcion"]);

				$respuesta = ModeloTestaction::mdlIngresarTestaction($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: " Testaction ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "testaction";

									}
								})

					</script>';

				}


			

		}

	}

	/*=============================================
	MOSTRAR Testaction
	=============================================*/

	static public function ctrMostrarTestaction($item, $valor){

		$tabla = "Testaction";

		$respuesta = ModeloTestaction::mdlMostrarTestaction($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR TESTACTION
	=============================================*/

	static public function ctrEditarTestaction(){

		if(isset($_POST["editarid_evento"])){

			

				$tabla = "testaction";

				$datos = array("id"=>$_POST["idTestaction"],
				"id_evento"=>$_POST["editarid_evento"],
				"id_text"=>$_POST["editarid_text"],
				"id_test_opcion"=>$_POST["editarid_test_opcion"]);
										
				$respuesta = ModeloTestaction::mdlEditarTestaction($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: " Testaction ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "testaction";

									}
								})

					</script>';

				}


			

				

            

		}

	}

	/*=============================================
	BORRAR TESTACTION
	=============================================*/

	static public function ctrBorrarTestaction(){

		if(isset($_GET["idTestaction"])){

				$tabla ="testaction";
				$datos = $_GET["idTestaction"];

				$respuesta = ModeloTestaction::mdlBorrarTestaction($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "La Testaction ha sido borrada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "testaction";

										}
									})

						</script>';
				}

		}
		
	}
}
