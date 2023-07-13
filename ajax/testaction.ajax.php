<?php

require_once "../controladores/testaction.controlador.php";
require_once "../modelos/testaction.modelo.php";

class AjaxTestaction{

	/*=============================================
	EDITAR TESTACTION
	=============================================*/	

	public $idTestaction;

	public function ajaxEditarTestaction(){

		$item = "id";
		$valor = $this->idTestaction;

		$respuesta = ControladorTestaction::ctrMostrarTestaction($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR TESTACTION
=============================================*/	

if(isset($_POST["idTestaction"])){

	$testaction = new AjaxTestaction();
	$testaction -> idTestaction = $_POST["idTestaction"];
	$testaction -> ajaxEditarTestaction();

}