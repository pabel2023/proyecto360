<?php

require_once "conexion.php";

class ModeloTestopcion{

	/*=============================================
	CREAR Testopcion
	=============================================*/

	static public function mdlIngresarTestopcion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_evento, id_test, texto, estado) VALUES (:id_evento, :id_test, :texto, :estado)");

		$stmt->bindParam(":id_evento", $datos["id_evento"], PDO::PARAM_INT);
		$stmt->bindParam(":id_test", $datos["id_test"], PDO::PARAM_INT);
		$stmt->bindParam(":texto", $datos["texto"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR Testopcion
	=============================================*/

	static public function mdlMostrarTestopcion($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR Testopcion
	=============================================*/

	static public function mdlEditarTestopcion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_evento = :id_evento, id_test = :id_test, texto = :texto, estado = :estado WHERE id = :id");

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":id_evento", $datos["id_evento"], PDO::PARAM_INT);
		$stmt -> bindParam(":id_test", $datos["id_test"], PDO::PARAM_INT);
		$stmt -> bindParam(":texto", $datos["texto"], PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR Testopcion
	=============================================*/

	static public function mdlBorrarTestopcion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

