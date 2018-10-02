<?php 

namespace Mini\Controller;

use Mini\Model\Reporte;
use Mini\Model\Ruta;
use Mini\Model\Producto;

class ReporteController {
    
    public function index(){
        $rutas = new Ruta();
        $resultado = $rutas->mostrar_rutas();
        $productos = new Producto();
        $productos->__SET("nombre", "");
        $productos->__SET("id_categoria", "");
        $pro = $productos->listar_productos();
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
        $reporte->__SET("producto", $_POST['producto']);
        
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
                <th>Cantidad vendida</th>
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
                <th>Nombre producto</th>
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
        }else if($_POST["reporte"] == "5"){
            $datos = $reporte->buscar_reportemovimientos();
            if(empty($datos)){
            $salida.="No Hay Movimientos";
            }else {
        $salida.="<table'>
        <thead>
            <tr>
                <th>Tipo de movimiento</th>
                <th>Pedido</th>
                <th>Producto</th>
                <th>cantidad</th>
                <th>Descripcion</th>
                <th>Estado del producto</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>";
        foreach($datos as $value):
                if($value->estado_producto == 1){
                    $texto = "Activo";
                }else {
                    $texto = "Inactivo";
                }
        $salida.="<tr>
                <td>
                    ".$value->tipo_movimiento."
                </td>
                <td>
                    ".$value->id_pedido."
                </td>
                <td>
                    ".$value->nombre_producto."
                </td>
                <td>
                    ".$value->cantidad."
                </td>
                <td>
                    ".$value->descripcion."
                </td>
                <td>
                    ".$texto."
                </td>
                <td>
                    ".$value->fecha."
                </td>
    </tr>"; 
        endforeach;
        $salida.="</tbody></table>";
        }
        }

        echo $salida;
    }
}
