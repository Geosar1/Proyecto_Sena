<?php

namespace Mini\controller;

use Mini\Model\Producto;
use Mini\Model\compras;
use Mini\Model\Proveedor;

class comprasController{


public function index(){

    $compras = new compras();

    $compra = $compras->listarMaestro();
    $proveedor = new Proveedor();
    $proveedores = $proveedor->Mostrar_proveedores();  

    require APP.'view/consultarCompras.php';
    
}


public function crear($id = -1){


    $proveedor = new Proveedor();
    $proveedores = $proveedor->Mostrar_proveedores();  
    if($id > 0)
    {
        $compra = new compras();
        $compra->__SET("id_compra",$id);
        
        $respuesta = $compra->ConsultarPorId();

        $_SESSION["alerta"] = "Mostrar_proveedores(1);"; 
    }
    
    require APP.'view/crearCompras.php';
   
    }

    public function guardar(){
        try{
                $compras = new compras(); 
               $compras->__SET ("total",$_POST["total"]);
               $compras->__SET ("id_proveedor",$_POST["ddlproveedor"]);
                $respuesta = $compras->guardarEncabezado();			
                if($respuesta)
                {
                    $idCompra = $compras->UltimaCompra()->Id;
                    for($i = 0; $i<count($_POST["productos"]); $i++)
                    {
                       $compras->__SET ("id_compra", $idCompra);
                       $compras->__SET ("id_producto", str_replace("/","",$_POST["productos"][$i]));
                       $compras->__SET ("precio_unitario", str_replace("/","",$_POST["precios"][$i]));
                       $compras->__SET ("cantidad", str_replace("/","",$_POST["cantidades"][$i]));
                       $compras->__SET ("subtotal", str_replace("/","",$_POST["precios"][$i])*str_replace("/","",$_POST["cantidades"][$i]));
                                
              
                       $compras->guardarDetalle();
  
                    } 
                    $_SESSION["RESPUESTA"] = "Datos guardados correctamente"; 
                    
                }
               else{
                  
                   $_SESSION["RESPUESTA"] = "No se logró guardar la información, por favor intente nuevamente."; 
               }
            
           }
           catch(\Exception $ex){
               
               $_SESSION["RESPUESTA"] = "Ocurrió un error. datos no guardados";    
           }
           echo $respuesta;
           $_SESSION['LOCAL']="6";
       header("location:" .URL."/Login/menu");
       }

        public function Consultarproveedor($id){
            $p = new Proveedor();
            $p-> __SET("id",$id);
            $proveedor = $p->listar_proveedorProducto();
            echo json_encode($proveedor);
        }

        public function ConsultarCompra(){

            $idProveedor = $_GET["idproveedor"];
            $fechaInicio = $_GET["fechaInicio"];
            $fechaFin = $_GET["fechaFin"];
            $c = new compras();
            if($idProveedor == ""){
                $idProveedor = "%%";
            }
            if($fechaInicio == null){
                $fechaInicio = "1890-01-01";
            }
            
            if($fechaFin == null){
                $fechaFin = "2030-12-31";
            }
            $compra = $c->listar($idProveedor, $fechaInicio, $fechaFin);
        
            echo json_encode($compra);
        }

        public function ConsultarDetalle($id){
            $compra = new compras();
            $compra->__SET("id_compra",$id);
            $detalleCompra = $compra->ConsultarPorId();
            echo json_encode($detalleCompra);
        }

        function Estado($id,$estado)
        {
            echo $id;
            $compra = new compras();
            $compra-> __SET("estado",$estado);
            $compra-> __SET("id_compra",$id);
            if($compra->cambiarEstado())
            {                
               
                header("location:" .URL."/compras/consultarCompras");
            }           
            else
            {
                $_SESSION["alerta"] = "alert('Ocurrió un error al cambiar el estado,por favor intente de nuevo.')";                    
            }
        }
   }

