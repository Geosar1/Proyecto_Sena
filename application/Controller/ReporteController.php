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
        $inicio;
        $fin;

        if($_POST['inicio'] != ""){
            $inicio = $_POST['inicio'];
        }else {
            $inicio = "2000-01-01";
        }

        if($_POST['fin'] != ""){
            $fin= $_POST['fin'];
        }else {
            $fin = "3000-01-01";
        }

        $reporte->__SET("id_ruta", $_POST["id"]);
        $reporte->__SET("fecha_inicio", $inicio);
        $reporte->__SET("fecha_fin", $fin);
        
        if($_POST["reporte"] == "1"){
            $datos = $reporte->buscar_reporteclientes();
            if(empty($datos)){
            $salida.="No hay compras";
            }else {
        $salida.="<table>
        <thead>
            <tr>
                <th>Nombre cliente</th>
                <th>Total compras</th>
            </tr>
            </thead>
            <tbody>";
        foreach($datos as $value):
        $salida.="<tr>
                <td>
                    ".$value->cliente."
                </td>
                <td>
                    ".$value->entregado."
                </td>
    </tr>";
        endforeach;
        $salida.="</tbody></table>";
        }
        }else if($_POST["reporte"] == "2"){
            $datos = $reporte->buscar_reportevendidos();
            if(empty($datos)){
            $salida.="No hay ventas";
            }else {
        $salida.="<table>
        <thead>
            <tr>
                <th>Nombre producto</th>
                <th>Cantidad Vendida</th>
            </tr>
            </thead>
            <tbody>";
        foreach($datos as $value):
        $salida.="<tr>
                <td>
                    ".$value->nombre_producto."
                </td>
                <td>
                    ".$value->vendido."
                </td>
    </tr>";
        endforeach;
        $salida.="</tbody></table>";
            }
        }else if($_POST["reporte"] == "3"){
            $datos = $reporte->buscar_reportecomprados();
            if(empty($datos)){
            $salida.="No hay compras";
            }else {
        $salida.="<table>
        <thead>
            <tr>
                <th>Nombre Producto</th>
                <th>Cantidad Comprada</th>
            </tr>
            </thead>
            <tbody>";
        foreach($datos as $value):
        $salida.="<tr>
                <td>
                    ".$value->nombre_producto."
                </td>
                <td>
                    ".$value->comprado."
                </td>
    </tr>";
        endforeach;
        $salida.="</tbody></table>";
            }
        }else if($_POST["reporte"] == "4"){
            $datos = $reporte->Buscar_reporteruta();
            if(empty($datos)){
            $salida.="No hay ventas";
        }else {
        $salida.="<table>
        <thead>
            <tr>
                <th>Nombre Cliente</th>
                <th>ID Pedido</th>
                <th>Fecha</th>
                <th>Tipo de Venta</th>
                <th>Precio del Pedido</th>
                <th>Observaciones</th>
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
        }


        echo $salida;
    }
}
