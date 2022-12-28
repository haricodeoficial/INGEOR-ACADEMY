<?php
require_once "conexion.php";
class ModeloUsuarios{
    /*
    Registro de usuario
    */
    static public function mdlRegistroUsuario($tabla,$datos){
        $stmt = conexionBaseDeDatos::conectar()->prepare("INSERT INTO $tabla(nombre,apellido, password, email,foto,modo,verificacion, emailEncriptado)VALUES (:nombre,:apellido,:password,:email,:foto,:modo,:verificacion,:emailEncriptado)");
        $stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":apellido",$datos["apellido"],PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"],PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"],PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"],PDO::PARAM_STR);
        $stmt->bindParam(":modo", $datos["modo"],PDO::PARAM_STR);
        $stmt->bindParam(":verificacion", $datos["verificacion"],PDO::PARAM_INT);
        $stmt->bindParam(":emailEncriptado", $datos["emailEncriptado"],PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt->close();
        $stmt = null; 
    }
    //Mostrar Usuario
	static public function mdlMostrarUsuario($tabla, $item, $valor){
		$stmt = conexionBaseDeDatos::conectar()->prepare("SELECT *FROM $tabla WHERE $item = :$item");
        $stmt->bindParam(":".$item, $valor,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt -> fetch();
        $stmt-> close();
        $stmt = null; 


	}
    //Actualizar Usuario
    static public function mdlActualizarUsuario($tabla, $id, $item, $valor){

		$stmt = conexionBaseDeDatos::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE id = :id");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

	}
    /*ACTUALIZAR PERFIL */
    static public function mdlActualizarPerfil($tabla, $datos){
        $stmt = conexionBaseDeDatos::conectar()->prepare("UPDATE $tabla SET nombre = :nombre,email = :email,password = :password,foto = :foto WHERE id = :id");

		$stmt -> bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"],PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"],PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datos["foto"],PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;
    }

    //Mostrar Compras
    static public function mdlMostrarCompras($tabla, $item, $valor){
		$stmt = conexionBaseDeDatos::conectar()->prepare("SELECT *FROM $tabla WHERE $item = :$item");
        $stmt->bindParam(":".$item, $valor,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt -> fetchAll();
        $stmt-> close();
        $stmt = null; 


	}
}

