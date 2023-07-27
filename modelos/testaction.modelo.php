<?php

require_once "conexion.php";

class ModeloTestaction{

	/*=============================================
	CREAR Testaction
	=============================================*/

	static public function mdlIngresarTestaction($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_evento, id_text, id_test_opcion, id_usuario, text) VALUES (:id_evento, :id_text, :id_test_opcion, :id_usuario, :text)");

		$stmt->bindParam(":id_evento", $datos["id_evento"], PDO::PARAM_INT);
		$stmt->bindParam(":id_text", $datos["id_text"], PDO::PARAM_INT);
		$stmt->bindParam(":id_test_opcion", $datos["id_test_opcion"], PDO::PARAM_INT);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":text", $datos["text"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR Testaction
	=============================================*/

	static public function mdlMostrarTestaction($tabla, $item, $valor){

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
	EDITAR Testaction
	=============================================*/

	static public function mdlEditarTestaction($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_evento = :id_evento, id_text = :id_text, id_test_opcion = :id_test_opcion, id_usuario = :id_usuario WHERE id = :id");

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":id_evento", $datos["id_evento"], PDO::PARAM_INT);
		$stmt -> bindParam(":id_text", $datos["id_text"], PDO::PARAM_INT);
		$stmt -> bindParam(":id_test_opcion", $datos["id_test_opcion"], PDO::PARAM_INT);
		$stmt -> bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);

		

		if ($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR Testaction
	=============================================*/

	static public function mdlBorrarTestaction($tabla, $datos){

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

