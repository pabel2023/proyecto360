<?php

require_once "../controladores/vieventos.controlador.php";
require_once "../modelos/vieventos.modelo.php";

class AjaxVieventos{

	/*=============================================
	EDITAR VIEVENTOS
	=============================================*/	

	public $idVieventos;

	public function ajaxEditarVieventos(){

		$item = "codigo";
		$valor = $this->idVieventos;
		

		$respuesta = ControladorVieventos::ctrMostrarVieventos($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR VIEVENTOS
=============================================*/	

if(isset($_POST["idVieventos"])){

	$vieventos = new AjaxVieventos();
	$vieventos -> idVieventos = $_POST["idVieventos"];
	$vieventos -> ajaxEditarVieventos();

}