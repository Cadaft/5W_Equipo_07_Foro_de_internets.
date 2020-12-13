<?php 

class Conexion{

    static public function conectar(){

        $link = new PDO("mysql:host=localhost;dbname=kaffee_fushs",
                        "root", 
                        "");
        return $link;

    }

}

?>