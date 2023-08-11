<?php

class ControladorItemCorum{
	
	
	/*=============================================
	CARGAR ITEMCORUM
	=============================================*/
	static public function ctrCargarItemCorum(){
		if(isset($_FILES["dataCliente"]) && isset($_POST["idEventoCargue"])){
		
			$tipo       = $_FILES['dataCliente']['type'];
			$tamanio    = $_FILES['dataCliente']['size'];
			$archivotmp = $_FILES['dataCliente']['tmp_name'];
			$lineas     = file($archivotmp);
		
			$i = 0;
			
			ModeloItemCorum::mdlBorrarItemCorum2("itemcorum",$_POST["idEventoCargue"]);

			foreach ($lineas as $linea) {
				$cantidad_registros = count($lineas);
				$cantidad_regist_agregados =  ($cantidad_registros - 1);

				if ($i <> 0) {

					$datos = explode(";", $linea);
				   if(empty($datos[0]) && empty($datos[1]) && empty($datos[2]) && empty($datos[3]) && empty($datos[4])
					  && empty($datos[5]) && empty($datos[6]) && empty($datos[7]) && empty($datos[8]) && empty($datos[9])
					   && empty($datos[10]) && empty($datos[11])){
									
							
				   }else{
					   $tabla = "itemcorum";

						$datas = array(
						"id_evento"=>$_POST["idEventoCargue"],
						"nombre"=>$datos[1],
						"tipo"=>$datos[2],
						"porcentage"=>$datos[3],
						"documento_titular"=>$datos[4],
						"nombre_titular"=>$datos[5],
						"apellido_titular"=>$datos[6],
						"documento_encargado"=>$datos[7],
						"nombre_encargado"=>$datos[8],
						"apellido_encargado"=>$datos[9],
						"estado"=>$datos[10]
						);
						
							
				

						
						$respuesta = ModeloItemCorum::mdlIngresarItemCorum($tabla, $datas);
				   }
			}
				

				 // echo '<div>'. $i. "). " .$linea.'</div>';
				$i++;
			}


			echo'<script>

					swal({
						  type: "success",
						  title: " Quórum ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "itemcorum";

									}
								})

					</script>';


				//echo '<p style="text-aling:center; color:#333;">Total de Registros: '. $cantidad_regist_agregados .'</p>';

		
				//echo '<script language="javascript">alert("'.$tipo.'");</script>';
		
		}else{
			
		//echo '<script language="javascript">alert("juas2");</script>';
		
		}
	}

	/*=============================================
	CREAR ITEMCORUM
	=============================================*/

	static public function ctrCrearItemCorum(){

		if(isset($_POST["nuevaid_evento"])){

			
				$tabla = "itemcorum";

				$datos = array(
				"id_evento"=>$_POST["nuevaid_evento"],
				"nombre"=>$_POST["nuevanombre"],
				"tipo"=>$_POST["nuevatipo"],
				"porcentage"=>$_POST["nuevaporcentage"],
				"documento_titular"=>$_POST["nuevadocumento_titular"],
				"nombre_titular"=>$_POST["nuevanombre_titular"],
				"apellido_titular"=>$_POST["nuevaapellido_titular"],
				"documento_encargado"=>$_POST["nuevadocumento_encargado"],
				"nombre_encargado"=>$_POST["nuevanombre_encargado"],
				"apellido_encargado"=>$_POST["nuevaapellido_encargado"],
				"estado"=>$_POST["nuevaestado"]
				);
							 
				$respuesta = ModeloItemCorum::mdlIngresarItemCorum($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: " Quórum ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "itemcorum";

									}
								})

					</script>';

				}


			

			}

	}

	/*=============================================
	MOSTRAR ItemCorum
	=============================================*/

	static public function ctrMostrarItemCorum($item, $valor){
		
		$tabla = "itemcorum";

		$respuesta = ModeloItemCorum::mdlMostrarItemCorum($tabla, $item, $valor);

		return $respuesta;
	
	}
	
	static public function ctrMostrarItemCorum2($item, $valor){
		
		$tabla = "itemcorum";

		$respuesta = ModeloItemCorum::mdlMostrarItemCorum2($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR ITEMCORUM
	=============================================*/

	static public function ctrEditarItemCorum(){
						 
		if(isset($_POST["idItemCorum"])){
			
			

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnombre"])){

				$tabla = "itemcorum";

				$datos = array(	"id"=>$_POST["idItemCorum"],
								"id_evento"=>$_POST["editarid_evento"],
								"nombre"=>$_POST["editarnombre"],
								"tipo"=>$_POST["editartipo"],
								"porcentage"=>$_POST["editarporcentage"],
								"documento_titular"=>$_POST["editardocumento_titular"],
								"nombre_titular"=>$_POST["editarnombre_titular"],
								"apellido_titular"=>$_POST["editarapellido_titular"],
								"documento_encargado"=>$_POST["editardocumento_encargado"],
								"nombre_encargado"=>$_POST["editarnombre_encargado"],
								"apellido_encargado"=>$_POST["editarapellido_encargado"],
								"estado"=>$_POST["editarestado"]
								);

				$respuesta = ModeloItemCorum::mdlEditarItemCorum($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: " Quórum ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									
									window.location = "index.php?ruta=itemcorum&idEventos='.$_POST["editarid_evento"].'";
									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Quórum no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index.php?ruta=itemcorum&idEventos="'.$_POST["editarid_evento"].';

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR ITEMCORUM
	=============================================*/

	static public function ctrBorrarItemCorum(){

		if(isset($_GET["idItemCorum"])){

				$tabla ="itemcorum";
				$datos = $_GET["idItemCorum"];

				$respuesta = ModeloItemCorum::mdlBorrarItemCorum($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "Quórum ha sido borrada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?ruta=itemcorum&idEventos='.$_GET["idEventos"].'";

										}
									})

						</script>';
				}

		}
		
	}
	
	static public function ctrBorrarItemCorum2(){

		if(isset($_POST["idEventoX"])){

				$tabla ="itemcorum";
				

				$respuesta = ModeloItemCorum::mdlBorrarItemCorum2("itemcorum",$_POST["idEventoX"]);
				

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "Quórum ha sido borrada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?ruta=itemcorum&idEventos='.$_GET["idEventos"].'";

										}
									})

						</script>';
				}

		}
		
	}
	
	
}
