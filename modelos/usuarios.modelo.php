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
    static public function mdlBuscarUsuario($tabla, $valor){
        $stmt = conexionBaseDeDatos::conectar()->prepare("SELECT *FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id",$valor,PDO::PARAM_INT);
        $stmt -> execute();
		return $stmt ->fetchAll();
		$stmt -> close();
		$stmt = null;
    }
     //Mostrar Comentarios
     static public function mdlMostrarComentariosPerfil($tabla, $datos){
        if($datos["idUsuario"] != ""){
            $stmt = conexionBaseDeDatos::conectar()->prepare("SELECT *FROM $tabla WHERE id_usuario = :id_usuario AND id_producto = :id_producto");
            $stmt->bindParam(":id_usuario",$datos["idUsuario"],PDO::PARAM_STR);
            $stmt->bindParam(":id_producto",$datos["idProducto"],PDO::PARAM_INT);
            $stmt->execute();
            return $stmt -> fetchAll();
        }else{
            $stmt = conexionBaseDeDatos::conectar()->prepare("SELECT *FROM $tabla WHERE id_producto = :id_producto");
            $stmt->bindParam(":id_usuario",$datos["idUsuario"],PDO::PARAM_STR);
            $stmt->bindParam(":id_producto",$datos["idProducto"],PDO::PARAM_INT);
            $stmt->execute();
            return $stmt -> fetchAll();
        }
		
        $stmt-> close();
        $stmt = null; 


	}

    //Actualizar Comentario
    static public function mdlActualizarComentario($tabla, $datos){

		$stmt = conexionBaseDeDatos::conectar()->prepare("UPDATE $tabla SET rating = :rating, comentario = :comentario WHERE id = :id");
        

        $stmt->bindParam(":rating", $datos["rating"], PDO::PARAM_INT);
		$stmt->bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

	}

    //Agregar a lista de deseos
    static public function mdlAgregarDeseo($tabla, $datos){

		$stmt = conexionBaseDeDatos::conectar()->prepare("INSERT INTO $tabla (id_usuario, id_producto) VALUES (:id_usuario, :id_producto)");

		$stmt->bindParam(":id_usuario", $datos["idUsuario"], PDO::PARAM_INT);
		$stmt->bindParam(":id_producto", $datos["idProducto"], PDO::PARAM_INT);	

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

	}
        //Mostrar Lista de deseos
        static public function mdlMostrarDeseos($tabla, $item){

            $stmt = conexionBaseDeDatos::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario = :id_usuario ORDER BY id DESC");
    
            $stmt -> bindParam(":id_usuario", $item, PDO::PARAM_INT);
    
            $stmt -> execute();
    
            return $stmt -> fetchAll();
    
            $stmt -> close();
    
            $stmt = null;
    
        }
        //Quitar producto de lista de deseos
        static public function mdlQuitarDeseo($tabla, $datos){

            $stmt = conexionBaseDeDatos::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
    
            $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
    
            if($stmt -> execute()){
    
                return "ok";
    
            }else{
    
                return "error";
    
            }
    
            $stmt-> close();
    
            $stmt = null;
    
        }

}

