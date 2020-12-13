<?php 
error_reporting (0);
session_start ();
require_once "models/formulariosModelo.php";
 class ControladorFormularios{

    static public function Registro(){
        if(isset($_POST["registroUsuario"])){
            $tabla = "registros";
            $img= $_FILES['registroImagen']['name'];
            $archivo= $_FILES['registroImagen']['tmp_name'];
            $ruta = "imagenes/".$img;
            move_uploaded_file($archivo, $ruta);
            $datos = array("nombre" => $_POST["registroNombre"]
                          ,"email" => $_POST["registroEmail"]
                          ,"password" => $_POST["registroPassword"]
                          ,"usuario" => $_POST["registroUsuario"]
                          ,"avatar" => $ruta);
            
            
            $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
            
            return $respuesta;
        }
     }

    public function Ingreso(){
        if(isset($_POST["ingresoUsuario"])){

            $tabla = "registros";
            $col = "usuario";
            $valor = $_POST["ingresoUsuario"];

            $respuesta = ModeloFormularios::mdlIngreso($tabla, $col, $valor);

            if($respuesta["usuario"] == $_POST["ingresoUsuario"] && $respuesta["password"] == $_POST["ingresoPassword"]){
                $_SESSION['Id'] = $respuesta["id"];
                $_SESSION['Usuario'] = $respuesta["usuario"];
                $_SESSION['Nombre'] = $respuesta["nombre"];
                $_SESSION['Email'] = $respuesta["email"];
                $_SESSION['Avatar'] = $respuesta["avatar"];
                $_SESSION['Fecha'] = $respuesta["fecha"];
                echo '<script>

                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }

                window.location = "home.php";
                </script>';

                
            }else{
                echo '<script>

                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
                </script>';
                
            echo "Usuario o Contraseña Incorrecta";
            }
        }
     }

     static public function Comentar(){
        if(isset($_POST["comentar"])){
            $tabla = $_GET["tema"];
            $datos = array("comentario" => $_POST["comentario"]
                          ,"usuario" => $_SESSION['Id']);
            
            $respuesta = ModeloFormularios::mdlComentar($tabla, $datos);
            
            return $respuesta;
        }
     }
     static public function Reply(){
        if(isset($_POST["reply"])){
            $tabla = $_GET["tema"];
            $datos = array("comentario" => $_POST["comentario"]
                          ,"usuario" => $_SESSION['Id']
                          ,"reply" => $_GET["id"]);
            
            $respuesta = ModeloFormularios::mdlReply($tabla, $datos);
            
            return $respuesta;
        }
     }
}
?>