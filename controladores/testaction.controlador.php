<?php

class ControladorTestaction{

	/*=============================================
	CREAR TESTACTION
	=============================================*/

	static public function ctrCrearTestaction(){

		if(isset($_POST["nuevaEvento"])){



				$tabla ="testaction";

				$datos = array(
				"id_evento"=>$_POST["nuevaEvento"],
				"id_test"=>$_POST["nuevaid_test"],
				"id_test_opcion"=>$_POST["nuevaid_test_opcion"],
				"text"=>$_POST["text"],
				"id_usuario"=>$_SESSION["usuario"]);

				$respuesta = ModeloTestaction::mdlIngresarTestaction($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: " la votacion ha sido guardada correctamente",
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
	
	static public function ctrCrearTestaction2(){

		if(isset($_GET["idEvento"]) && isset($_GET["idTest"]) && isset($_GET["respuesta"])){



				$tabla ="testaction";

				$datos = array(
				"id_evento"=>$_GET["idEvento"],
				"id_test"=>$_GET["idTest"],
				"id_test_opcion"=>null,
				"text"=>$_GET["respuesta"],
				"id_usuario"=>$_SESSION["usuario"]);

				$respuesta = ModeloTestaction::mdlIngresarTestaction($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: " la votacion ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "inicio";

									}
								})

					</script>';

				}


			

		}else{
			
			echo'aqui!!';
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
				"id_test"=>$_POST["editarid_test"],
				"id_test_opcion"=>$_POST["editarid_test_opcion"],
				"id_usuario"=>$_POST["editarid_usuario"]);
										
				$respuesta = ModeloTestaction::mdlEditarTestaction($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: " La votacion ha sido cambiada correctamente",
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
							  title: "La votacion ha sido borrada correctamente",
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
