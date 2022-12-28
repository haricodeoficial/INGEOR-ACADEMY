<?php
require_once "conexion.php";
class modeloAcademy{
	static public function modeloDatos($tabla, $item, $valor){
		if ($item != null) {
		$stmt = conexionBaseDeDatos::conectar()->prepare("SELECT *FROM $tabla WHERE $item = :$item");
		$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		}
		else{
			$stmt = conexionBaseDeDatos::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt ->fetchAll();
		}
$stmt -> close();
$stmt = null;

	}
	static public function mdlListarCursos($tabla, $ordenar, $item, $valor){

		if($item != null){

			$stmt = conexionBaseDeDatos::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar DESC");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = conexionBaseDeDatos::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlBuscarCursos($tabla, $busqueda, $ordenar, $modo, $base, $tope){
		$stmt = conexionBaseDeDatos::conectar()->prepare("SELECT *FROM $tabla WHERE ruta like '%$busqueda%' OR nombre like '%$busqueda%' OR descripcion like '%$busqueda%' OR introducción like '%$busqueda%' OR docente like '%$busqueda%' ORDER BY $ordenar $modo LIMIT $base,$tope");
		$stmt -> execute();
		return $stmt ->fetchAll();
		$stmt -> close();
		$stmt = null;

	}
	static public function mdlListarCursosBusqueda($tabla, $busqueda){
		$stmt = conexionBaseDeDatos::conectar()->prepare("SELECT *FROM $tabla WHERE ruta like '%$busqueda%' OR nombre like '%$busqueda%' OR descripcion like '%$busqueda%' OR introducción like '%$busqueda%' OR docente like '%$busqueda%'");
		$stmt -> execute();
		return $stmt ->fetchAll();
		$stmt -> close();
		$stmt = null;

	}
	
}