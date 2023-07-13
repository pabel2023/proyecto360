<?php

require_once "../controladores/testopcion.controlador.php";
require_once "../modelos/testopcion.modelo.php";

class AjaxTestopcion{

	/*=============================================
	EDITAR TESTOPCION
	=============================================*/	

	public $idTestopcion;

	public function ajaxEditarTestopcion(){

		$item = "id";
		$valor = $this->idTestopcion;

		$respuesta = ControladorTestopcion::ctrMostrarTestopcion($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR TESTOPCION
=============================================*/	

if(isset($_POST["idTestopcion"])){

	$testopcion = new AjaxTestopcion();
	$testopcion -> idTestopcion = $_POST["idTestopcion"];
	$testopcion -> ajaxEditarTestopcion();

}