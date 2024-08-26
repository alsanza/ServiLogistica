<?php

require_once "conexion.php";

class ModeloUsuarios
{
    static public function mdlMostrarUsuarios($tabla, $item, $valor) {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();
        return $stmt -> fetch();
    }

    static public function mdlAgregarUsuario() {

        
        
    }

    static public function mdlEditarUsuario() {

        
        
    }

    static public function mdlEliminarUsuario() {

        
        
    }
    
    
}
