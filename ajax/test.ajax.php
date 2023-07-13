<?php

require_once "../controladores/test.controlador.php";
require_once "../modelos/test.modelo.php";

class AjaxTest{

	/*=============================================
	EDITAR TEST
	=============================================*/	

	public $idTest;

	public function ajaxEditarTest(){

		$item = "id";
		$valor = $this->idTest;
		

		$respuesta = ControladorTest::ctrMostrarTest($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR TEST
=============================================*/	

if(isset($_POST["idTest"])){

	$test = new AjaxTest();
	$test -> idTest = $_POST["idTest"];
	$test -> ajaxEditarTest();

}