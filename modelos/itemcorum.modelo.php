<?php

require_once "conexion.php";

class ModeloItemCorum{

	/*=============================================
	CREAR ItemCorum
	=============================================*/

	static public function mdlIngresarItemCorum($tabla, $datos){

		$stmt = Conexion::conectar()->prepare(
		"INSERT INTO $tabla(id_evento,nombre,tipo,porcentage,documento_titular,nombre_titular,apellido_titular,
		documento_encargado,nombre_encargado,apellido_encargado,estado) 
		VALUES (:id_evento,:nombre,:tipo,:porcentage,:documento_titular,:nombre_titular,
		:apellido_titular,:documento_encargado,:nombre_encargado,:apellido_encargado,:estado)");

		$stmt->bindParam(":id_evento", $datos["id_evento"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"] , PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"] , PDO::PARAM_STR);
		$stmt->bindParam(":porcentage", $datos["porcentage"] , PDO::PARAM_STR);
		$stmt->bindParam(":documento_titular", $datos["documento_titular"] , PDO::PARAM_STR);
		$stmt->bindParam(":nombre_titular", $datos["nombre_titular"] , PDO::PARAM_STR);
		$stmt->bindParam(":apellido_titular", $datos["apellido_titular"] , PDO::PARAM_STR);
		$stmt->bindParam(":documento_encargado", $datos["documento_encargado"] , PDO::PARAM_STR);
		$stmt->bindParam(":nombre_encargado", $datos["nombre_encargado"] , PDO::PARAM_STR);
		$stmt->bindParam(":apellido_encargado", $datos["apellido_encargado"] , PDO::PARAM_STR);
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

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '$valor'");

			$stmt -> execute();

			return $stmt ->  fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}
	
	
	static public function mdlMostrarItemCorum2($tabla, $item, $valor){

		

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '$valor' ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR ItemCorum
	=============================================*/

	static public function mdlEditarItemCorum($tabla, $datos){

		$stmt = Conexion::conectar()->prepare(
		"UPDATE $tabla SET id_evento=:id_evento,nombre=:nombre,
		tipo=:tipo,porcentage=:porcentage,documento_titular=:documento_titular,
		nombre_titular=:nombre_titular,apellido_titular=:apellido_titular,
		documento_encargado=:documento_encargado,nombre_encargado=:nombre_encargado,
		apellido_encargado=:apellido_encargado,estado=:estado 
		WHERE id = :id");

		
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_evento", $datos["id_evento"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"] , PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"] , PDO::PARAM_STR);
		$stmt->bindParam(":porcentage", $datos["porcentage"] , PDO::PARAM_STR);
		$stmt->bindParam(":documento_titular", $datos["documento_titular"] , PDO::PARAM_STR);
		$stmt->bindParam(":nombre_titular", $datos["nombre_titular"] , PDO::PARAM_STR);
		$stmt->bindParam(":apellido_titular", $datos["apellido_titular"] , PDO::PARAM_STR);
		$stmt->bindParam(":documento_encargado", $datos["documento_encargado"] , PDO::PARAM_STR);
		$stmt->bindParam(":nombre_encargado", $datos["nombre_encargado"] , PDO::PARAM_STR);
		$stmt->bindParam(":apellido_encargado", $datos["apellido_encargado"] , PDO::PARAM_STR);
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
	
		static public function mdlBorrarItemCorum2($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_evento = '$datos'");	

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


		/*=============================================
	ACTUALIZAR ItemCorum
	=============================================*/

	static public function mdlActualizarItemCorum($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

