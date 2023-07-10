<?php

require_once "conexion.php";

class ModeloItemCorum{

	/*=============================================
	CREAR ItemCorum
	=============================================*/

	static public function mdlIngresarItemCorum($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_evento,nombre,tipo,porcentage,documento_encargado,nombre_encargado,estado) VALUES (:id_evento,:nombre,:tipo,:porcentage,:documento_encargado,:nombre_encargado,:estado) ");

		$stmt->bindParam(":id_evento", $datos["id_evento"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"] , PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"] , PDO::PARAM_STR);
		$stmt->bindParam(":porcentage", $datos["porcentage"] , PDO::PARAM_STR);
		$stmt->bindParam(":documento_encargado", $datos["documento_encargado"] , PDO::PARAM_STR);
		$stmt->bindParam(":nombre_encargado", $datos["nombre_encargado"] , PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"] , PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR ItemCorumS
	=============================================*/

	static public function mdlMostrarItemCorum($tabla, $item, $valor){

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
	EDITAR ItemCorum
	=============================================*/

	static public function mdlEditarItemCorum($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_evento=:id_evento,nombre=:nombre,tipo=:tipo,porcentage=:porcentage,documento_encargado=:documento_encargado,nombre_encargado=:nombre_encargado,estado=:estado WHERE id = :id");

		
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_evento", $datos["id_evento"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"] , PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"] , PDO::PARAM_STR);
		$stmt->bindParam(":porcentage", $datos["porcentage"] , PDO::PARAM_STR);
		$stmt->bindParam(":documento_encargado", $datos["documento_encargado"] , PDO::PARAM_STR);
		$stmt->bindParam(":nombre_encargado", $datos["nombre_encargado"] , PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"] , PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR ItemCorum
	=============================================*/

	static public function mdlBorrarItemCorum($tabla, $datos){

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

