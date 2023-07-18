<?php

class ControladorEventos{

	/*=============================================
	CREAR EVENTOS
	=============================================*/

	static public function ctrCrearEventos(){
		
		if(isset($_POST["nuevanombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevanombre"])){
				


				$tabla = "eventos";

				$datos = array(
				"nombre"=>$_POST["nuevanombre"],
				"fecha_ini"=>$_POST["nuevafecha_ini"],				
				"fecha_fin"=>$_POST["nuevafecha_fin"],
				"hora_ini"=>$_POST["nuevahora_ini"],
				"hora_fin"=>$_POST["nuevahora_fin"],
				"estado"=>$_POST["nuevaestado"],
				"codigo"=>"EV".date("H").date("i").date("s")
						);

				$respuesta = ModeloEventos::mdlIngresarEventos($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: " La Asamblea ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "eventos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡ El nombre no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "eventos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR Eventos
	=============================================*/

	static public function ctrMostrarEventos($item, $valor){

		$tabla = "eventos";

		$respuesta = ModeloEventos::mdlMostrarEventos($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR EVENTOS
	=============================================*/

	static public function ctrEditarEventos(){

		if(isset($_POST["idEventos"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnombre"])){

				$tabla = "eventos";

				$datos = array("id"=>$_POST["idEventos"],
								"nombre"=>$_POST["editarnombre"],								
								"fecha_ini"=>$_POST["editarfecha_ini"],
								"fecha_fin"=>$_POST["editarfecha_fin"],
								"hora_ini"=>$_POST["editarhora_ini"],
								"hora_fin"=>$_POST["editarhora_fin"],
								"estado"=>$_POST["editarestado"]
								);

				$respuesta = ModeloEventos::mdlEditarEventos($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: " La Asamblea ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "eventos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "eventos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR EVENTOS
	=============================================*/

	static public function ctrBorrarEventos(){

		if(isset($_GET["idEventos"])){

				$tabla ="eventos";
				$datos = $_GET["idEventos"];

				$respuesta = ModeloEventos::mdlBorrarEventos($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "La Asamblea ha sido borrada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "eventos";

										}
									})

						</script>';
				}

		}
		
	}
}
