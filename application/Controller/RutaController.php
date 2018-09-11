<?php

namespace Mini\Controller;

use Mini\Model\ruta;
use Mini\Model\municipio;
use Mini\Model\barrio;

class RutaController{

    public function index(){

        $rutas = new Ruta();
        $rutas = $rutas->listar();
        //require APP."view/_templates/header.php";
        require APP."view/Ruta/index.php";
        //require APP."view/_templates/footer.php";
    }

    
    public function crear(){

        //$Municipio = new municipio();
        //$municipios = $Municipio->listar();
        
        $rutas = new Ruta();
        $rut = $rutas->listarMunicipio();
        
    
        $rutas = new Ruta();
        $ba = $rutas->listar_municipio_barrioo();

        //$rutas = new Ruta();
        //$rutas= $rutas->listar_municipio_barrioo();


        //require APP."view/_templates/header.php";
        
        require APP."view/ruta/crear.php";
        //require APP."view/_templates/footer.php";
    }




    public function editar($id_ruta){
        $rutas = new ruta();
        $rutas->__SET("id_ruta", $id_ruta);
        $r = $rutas->editar();
        $Municipio = new municipio();
        $municipios = $Municipio->listar();

        require APP."view/ruta/editar.php";
    }
    public function guardar(){
         $rutas = new Ruta();
         $rutas->__SET("nombre_ruta", $_POST["txtNombre"]);
         $rutas->__SET("id_municipio", $_POST["ddlMuni"]);
         $rutas->__SET("id_barrio", $_POST["ddlbarri"]);
         
         //$ruta->__SET("estado", $_POST["txtestado"]);
         // $ruta->crear();

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
            $_SESSION["mensaje"] = "Se cambio";
        } else {
            $_SESSION["mensaje"] = "No se cambio";
        }

        header("location: ".URL."ruta/index"); 
       }

       public function modificarr(){
         
        $rutas = new ruta();
        $rutas->__SET("nombre_ruta", $_POST["txtNombre"]);
        $rutas->__SET("id_municipio", $_POST["ddlMuni"]);
        $rutas->__SET("id_barrio", $_POST["ddlbarri"]);
        $rutas->__SET("id_ruta", $_POST["txxtId"]);

        //$ruta->__SET("estado", $_POST["txtestado"]);
        // $ruta->crear();

       if($rutas->modificar()){
           $_SESSION["mensaje"] = "Modificado";
       } else {
           $_SESSION["mensaje"] = "No se modificado";
       }
     
       header("location: ".URL."ruta/index"); 
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