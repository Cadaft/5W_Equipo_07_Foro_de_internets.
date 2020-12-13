<?php

require_once "conexion.php";

class ModeloFormularios{
    static public function mdlRegistro($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, nombre, email, password, avatar) VALUES (:usuario, :nombre, 
                                              :email,:password, :avatar)");
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":avatar", $datos["avatar"], PDO::PARAM_STR);

            if($stmt->execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
    }

    static public function mdlIngreso($tabla, $col, $valor){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $col = :$col");
        $stmt->bindParam(":".$col, $valor, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();

    }
    static public function mdlComentar ($tabla, $datos){
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(comentario, usuario) VALUES (:comentario, :usuario)");
        $stmt->bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }
    static public function mdlReply ($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(comentario, usuario, reply) VALUES (:comentario, :usuario, :reply)");
            $stmt->bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
            $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":reply", $datos["reply"], PDO::PARAM_STR);
            if($stmt->execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
        }
}
?>