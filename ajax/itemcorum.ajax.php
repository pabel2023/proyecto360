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

		echo json_encode($respuesta[0]);


	}

  /*=============================================
	ACTIVAR ItemCorum
	=============================================*/	

	public $activarItemCorum;
	public $activarId;


	public function ajaxActivarItemCorum(){

		$tabla = "itemcorum";

		$item1 = "participacion";
		$valor1 = $this->activarItemCorum;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloItemCorum::mdlActualizarItemCorum($tabla, $item1, $valor1, $item2, $valor2);

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

/*=============================================
ACTIVAR ItemCorum
=============================================*/	

if(isset($_POST["activarItemCorum"])){

	$activarItemCorum = new AjaxItemCorum();
	$activarItemCorum -> activarItemCorum = $_POST["activarItemCorum"];
	$activarItemCorum -> activarId = $_POST["activarId"];
	$activarItemCorum -> ajaxActivarItemCorum();

}