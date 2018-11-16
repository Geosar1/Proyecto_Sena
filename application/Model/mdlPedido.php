<?php 

namespace Mini\Model;

use Mini\Core\Model;

class mdlPedido extends Model {

    
    private $id_pedido;
    private $id_producto;
    private $cantidad;    
    private $subtotal_pedido;
    private $id_cliente;
    private $tipo_venta;
    private $valor_total;
    private $observaciones;
    

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function insertarPedido(){
        $stm = $this->db->prepare("CALL SP_InsertarPedido(?, ?, ?, ?)");
        $stm->bindParam(1, $this->id_cliente);
        $stm->bindParam(2, $this->tipo_venta);
        $stm->bindParam(3, $this->valor_total);
        $stm->bindParam(4, $this->observaciones);
        return $stm->execute();
    }

    public function insertarDetallePedido(){
        $sql = "CALL SP_InsertarDetallePedido(?, ?, ?, ?)";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->id_pedido);
        $stm->bindParam(2, $this->id_producto);
        $stm->bindParam(3, $this->cantidad);
        $stm->bindParam(4, $this->subtotal_pedido);
        return $stm->execute();
    }

    public function ultimaVenta(){
        $sql = "CALL SP_UltimoPedido()";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetch();
    }

    public function cambiar_estado(){
        $stm = $this->db->prepare("CALL Cambiar_estado_pedido(?,?)");
        $stm->bindParam(1, $this->id_pedido);
        $stm->bindParam(2, $this->estado_pedido);
        return $stm->execute();
    }

    public function buscar_pedido(){
        $stm = $this->db->prepare("CALL Buscar_pedido(?)");
        $stm->bindParam(1, $this->id_pedido);
        $stm->execute();
        return $stm->fetchAll();
    }
}
