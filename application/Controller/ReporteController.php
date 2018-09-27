<?php 

namespace Mini\Controller;

use Mini\Model\Reporte;
use Mini\Model\Ruta;

class ReporteController {
    
    public function index(){
        $rutas = new Ruta();
        $resultado = $rutas->mostrar_rutas();
        require APP.'view/reportes.php';
    }
    
    public function reporte_por_ruta(){
        $reporte = new Reporte();
        $salida="";
        $reporte->__SET("id_ruta", $_POST["id"]);
        $reporte->__SET("fecha_inicio", "");
        $reporte->__SET("fecha_fin", "");
        $datos = $reporte->Buscar_reporteruta();
        
        if(empty($datos)){
            $salida.="No hay ventas";
        }else {
        $salida.="<table>
        <thead>
            <tr>
                <th>Nombre cliente</th>
                <th>ID Pedido</th>
                <th>Fecha</th>
                <th>Tipo de venta</th>
                <th>Precio del pedido</th>
                <th>observaciones</th>
            </tr>
            </thead>
            <tbody>";
        foreach($datos as $value):
        $salida.="<tr>
                <td>
                    ".$value->cliente."
                </td>
                <td>
                    ".$value->id_pedido."
                </td>
                <td>
                    ".$value->fecha_de_creacion."
                </td>
                <td>
                    ".$value->tipo_venta."
                </td>
                <td>
                    ".$value->valor_total."
                </td>
                <td>
                    ".$value->observaciones."
                </td>
    </tr>"; 
        endforeach;
        $salida.="</tbody></table>";
        }
        echo $salida;
    }
    
}