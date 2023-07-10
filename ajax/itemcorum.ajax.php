<?php

require_once "../controladores/itemcorum.controlador.php";
require_once "../modelos/itemcorum.modelo.php";

class AjaxItemCorum{

	/*=============================================
	EDITAR ItemCorum
	=============================================*/	

	public $idItemCorum;

	public function ajaxEditarItemCorum(){

		$item = "id";
		$valor = $this->idItemCorum;
					 
		$respuesta = ControladorItemCorum::ctrMostrarItemCorum($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["idItemCorum"])){

	$cliente = new AjaxItemCorum();
	$cliente -> idItemCorum = $_POST["idItemCorum"];
	$cliente -> ajaxEditarItemCorum();

}