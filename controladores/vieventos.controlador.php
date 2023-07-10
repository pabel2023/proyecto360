<?php

class ControladorVieventos{

	

	/*=============================================
	MOSTRAR Vieventos
	=============================================*/

	static public function ctrMostrarVieventos($item, $valor){

		$tabla = "vieventos";

		$respuesta = ModeloVieventos::mdlMostrarVieventos($tabla, $item, $valor);

		return $respuesta;
	
	}



	
}
