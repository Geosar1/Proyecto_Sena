<?php 

namespace Mini\Controller;

use Mini\Model\Detalle;

class DetalleController {
    
    public function tabla(){
        $detalle = new Detalle();
        $salida="";
        $detalle->__SET("id", $_POST["id"]);
        $productos = $detalle->listar_detalle();
        
        $salida.="<table>
        <thead>
            <tr>
                <th>Proveedor</th>
                <th>Estado</th>
                <th>
                </th>
            </tr>
            </thead>
            <tbody>";
        foreach($productos as $value):
        if($value->estado_detalle==1){
        $estados = "Inhabilitar";
        $texto = "Activo";
        $color = "red";
        } else {
        $estados = "Habilitar";
        $texto = "Inactivo";
        $color = "green";
        }
        $salida.="<tr>
                <td>
                    ".$value->nombre_empresa."
                </td>
                <td>
                    ".$texto."
                </td>
                <td>
                <button style='background-color: ".$color." ;' id='Estado_d' value=".$value->id_detalle_producto_proveedor.">".$estados."</button>
                </td>
    </tr>"; 
        endforeach;
        $salida.="</tbody></table>";
        echo $salida;
    }
    
    public function Guardar(){
        $detalle = new Detalle();
        $detalle->__SET("producto", $_POST["id"]);
        $detalle->__SET("proveedor", $_POST["idpro"]);
            
        $existe = $detalle->buscar_detalle();
            
        if(empty($existe)){
           if($detalle->guardar_detalle()){
               echo "si";
           }else {
               echo "No se creo";
           }
         }else {
           echo "Existe";
        }
    }
    
    public function estado_detalle(){
        $detalle = new Detalle();
        $detalle->__SET("id", $_POST["id"]);
        $detalle->__SET("estado", $_POST["estado"]);
            
            
        if($detalle->cambiar_estado()){
            echo "si";
        }else{
            echo "no";
        }
    }
}
