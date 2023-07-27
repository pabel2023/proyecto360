<?php

class ControladorHash{

	

	/*=============================================
	MOSTRAR Hash
	=============================================*/

	static public function ctrMostrarHash($item, $valor){

		$tabla = "Hash";

		$respuesta = ModeloHash::mdlMostrarHash($tabla, $item, $valor);

		return $respuesta;
	
	}

	

	
}
