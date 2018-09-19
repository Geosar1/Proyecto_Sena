<?php

namespace Mini\Controller;

use Mini\Model\ruta;
use Mini\Model\municipio;
use Mini\Model\barrio;

class RutaController{

    public function index(){
        $rutas = new Ruta();
        $ruta = $rutas->listar();

        $rut = $rutas->listarMunicipio();
        
        $ba = $rutas->listar_municipio_barrioo();
        require APP."view/tabla-rutas.php";
    }

    
    public function crear(){
        $rutas = new Ruta();
     
        $rut = $rutas->listarMunicipio();
        $ba = $rutas->listar_municipio_barrioo();
        
        require APP."view/crear-ruta.php";
    }

    public function editar(){
        $rutas = new Ruta();
        $rutas->__SET("id_ruta", $_POST['id']);
        $r = $rutas->editar();

        echo json_encode($r);
    }
    
    public function guardar(){
         $rutas = new Ruta();
         $rutas->__SET("nombre_ruta", $_POST["txtNombre"]);
         $rutas->__SET("id_municipio", $_POST["ddlMuni"]);
         $rutas->__SET("id_barrio", $_POST["ddlbarri"]);

        if($rutas->crear()){
            $_SESSION["RESPUESTA"] = "Guardado";
        } else {
            $_SESSION["RESPUESTA"] = "No se guardo";
        }
        $_SESSION["LOCAL"] = "8";
        header("location: ".URL."Login/menu"); 
    }

       public function estado($id_ruta,$estado ){
        $rutas = new ruta();
        $rutas->__SET("id_ruta", $id_ruta);
        $rutas->__SET("estado", $estado);
        

        if($rutas->cambiar_estado()){
            $_SESSION["RESPUESTA"] = "Se cambio";
        } else {
            $_SESSION["RESPUESTA"] = "No se cambio";
        }

        $_SESSION["LOCAL"] = "8";
        header("location: ".URL."Login/menu"); 
       }

       public function modificarr(){
         
        $rutas = new ruta();
        $rutas->__SET("nombre_ruta", $_POST["txtNombre"]);
        $rutas->__SET("id_municipio", $_POST["ddlMuni"]);
        $rutas->__SET("id_barrio", $_POST["ddlbarri"]);
        $rutas->__SET("id_ruta", $_POST["txxtId"]);

       if($rutas->modificar()){
           $_SESSION["RESPUESTA"] = "Modificado";
       } else {
           $_SESSION["RESPUESTA"] = "No se modificado";
       }
       $_SESSION["LOCAL"] = "8";
        header("location: ".URL."Login/menu"); 
   }

   public function consultar_barrio(){
       $b= new Ruta();

       if(isset($_POST['id'])){
       $b->__SET("id_barrio",$_POST["id"]);
       $municipio = $b->listar_municipio_barrio();

       foreach($municipio as $value){
         $html .="<option value='".$value->id_barrio."'> ".$value->nombre_barrio."</option>";
   
    }
    echo($html);
}
       
   }
}