<?php

require_once "../controladores/eventos.controlador.php";
require_once "../modelos/eventos.modelo.php";

class AjaxEventos{

	/*=============================================
	EDITAR EVENTOS
	=============================================*/	

	public $idEventos;

	public function ajaxEditarEventos(){

		$item = "id";
		$valor = $this->idEventos;

		$respuesta = ControladorEventos::ctrMostrarEventos($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR EVENTOS
=============================================*/	

if(isset($_POST["idEventos"])){

	$eventos = new AjaxEventos();
	$eventos -> idEventos = $_POST["idEventos"];
	$eventos -> ajaxEditarEventos();

}