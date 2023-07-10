<?php

require_once "conexion.php";

class ModeloEventos{

	/*=============================================
	CREAR Eventos
	=============================================*/

	static public function mdlIngresarEventos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,fecha_ini,fecha_fin,hora_ini,hora_fin,estado,codigo) VALUES (:nombre,:fecha_ini,:fecha_fin,:hora_ini,:hora_fin,:estado,:codigo)");
		
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_ini", $datos["fecha_ini"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_fin", $datos["fecha_fin"] , PDO::PARAM_STR);
		$stmt->bindParam(":hora_ini", $datos["hora_ini"], PDO::PARAM_STR);
		$stmt->bindParam(":hora_fin", $datos["hora_fin"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR Eventos
	=============================================*/

	static public function mdlMostrarEventos($tabla, $item, $valor){

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
	EDITAR Eventos
	=============================================*/

	static public function mdlEditarEventos($tabla, $datos){

		echo($datos);
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre =:nombre ,fecha_ini=:fecha_ini, fecha_fin=:fecha_fin,hora_ini=:hora_ini, hora_fin=:hora_fin, estado=:estado  WHERE id = :id");

		$stmt-> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);		
		$stmt->bindParam(":fecha_ini", $datos["fecha_ini"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);
		$stmt->bindParam(":hora_ini", $datos["hora_ini"], PDO::PARAM_STR);
		$stmt->bindParam(":hora_fin", $datos["hora_fin"], PDO::PARAM_STR);
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
	BORRAR Eventos
	=============================================*/

	static public function mdlBorrarEventos($tabla, $datos){

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

