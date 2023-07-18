<?php

require_once "conexion.php";

class ModeloTest{

	/*=============================================
	CREAR Test
	=============================================*/

	static public function mdlIngresarTest($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_evento, texto, tipo, estado) VALUES (:id_evento, :texto, :tipo, :estado)");

		$stmt->bindParam(":id_evento", $datos["id_evento"], PDO::PARAM_INT);
		$stmt->bindParam(":texto", $datos["texto"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
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
	MOSTRAR Test
	=============================================*/

	static public function mdlMostrarTest($tabla, $item, $valor){

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
	EDITAR Test
	=============================================*/

	static public function mdlEditarTest($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_evento = :id_evento, texto = :texto, tipo = :tipo, estado = :estado WHERE id = :id");

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":id_evento", $datos["id_evento"], PDO::PARAM_INT);
		$stmt -> bindParam(":texto", $datos["texto"], PDO::PARAM_STR);
		$stmt -> bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
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
	BORRAR Test
	=============================================*/

	static public function mdlBorrarTest($tabla, $datos){

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

