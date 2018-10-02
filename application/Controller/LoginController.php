<?php 

namespace Mini\Controller;

use Mini\Model\Login;
use Mini\Libs\Helper;
use Mini\Core\Controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class LoginController {
    
    public function index(){
        
        if(isset ($_SESSION['USUARIO'])){
            header("location: ".URL."Login/menu");
        }else {
            
        }
            require APP.'view/Login.php';
    }
    
    public function menu(){
        require APP.'view/_templates/header.php';
        require APP.'view/Menu.php';
        require APP.'view/_templates/footer.php';
    }
    
    public function cerrar(){
        session_destroy();
        
        echo "Se cerro";
    }
    
    public function buscar(){
    $datos = new Login();
    $datos->__SET("usuario", $_POST['usuario']);
    $datos->__SET("clave", $_POST['clave']);
    $p = $datos->consulta_usuario();
        
    if(empty($p)){
        echo "usuario incorrecto";
    } else {
        $_SESSION['USUARIO']= $p;
    }

    }
    
    public function recuperar(){
    $datos = new Login();
    $datos->__SET("usuario", $_POST['usuario']);
    $datos->__SET("clave", $_POST['clave']);
    $p = $datos->recuperar_usuario();
        
    if(empty($p)){
        echo "usuario incorrecto";
    } else {
        echo $p->id_usuario;
    }

    }

    public function limpiar(){
        unset($_SESSION['RESPUESTA']);
        unset($_SESSION['LOCAL']);

        echo "se cerraron";
    }
    
    public function ayuda(){
        require APP.'view/ayuda.php';
    }
}
