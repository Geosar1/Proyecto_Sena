<?php

namespace Mini\Model;

use Mini\Core\Model;

class compras extends Model {
    private $id_compra;
    private $precio_unitario;
    private $total;
    private $id_producto;
    private $subtotal;
    private $cantidad;
    private $estado;
    private $id_proveedor;
    private $nombre_empresa;


    public function __SET($atributo, $valor){
    $this->$atributo = $valor;
    }

    public function __GET($atributo){
    return $this->$atributo;
    }

   public function listar($id_proveedor, $fechaInicio, $fechaFin){
       $sql = "SELECT c.*, p.id_proveedor, p.nombre_empresa
       from compra c
       INNER JOIN proveedor p on (c.id_proveedor = p.id_proveedor)
       where p.id_proveedor like ? AND CONVERT(fecha_de_compra, DATE) BETWEEN ? AND ? ORDER BY fecha_de_compra DESC";
       $stm = $this->db->prepare($sql);
       $stm->bindParam(1, $id_proveedor); 
       $stm->bindParam(2, $fechaInicio); 
       $stm->bindParam(3, $fechaFin); 
       $stm->execute();
       return $stm->fetchAll();        
   }


    public function listarMaestro(){
        $stm = $this->db->prepare("CALL SP_listarCompras()");
        $stm->execute();
        return $stm->fetchAll();
    }

    public function crear(){
        $sql = " INSERT INTO compra (total, id_proveedor) VALUES (?, ?)";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->total);
        $stm->bindParam(2, $this->id_proveedor);
        return $stm->execute();
    }

    public function ConsultarPorId(){
        $stm = $this->db->prepare("CALL SP_consultarDetalleCompra(?)");
        $stm->bindParam(1, $this->id_compra); 
        $stm->execute(); 
        return $stm->fetchAll(); 
    }

    public function guardarEncabezado(){
        $stm = $this->db->prepare("CALL SP_InsertarCompra(?, ?)");
        $stm->bindParam(1, $this->total);
        $stm->bindParam(2, $this->id_proveedor);
        return $stm->execute();
    }

    public function guardarDetalle(){
        $stm = $this->db->prepare("CALL SP_InsertarDetalleCompra(?,?,?,?,?)");
        $stm->bindParam(1, $this->id_compra);
        $stm->bindParam(2, $this->id_producto);
        $stm->bindParam(3, $this->precio_unitario);
        $stm->bindParam(4, $this->cantidad);
        $stm->bindParam(5, $this->subtotal);
        return $stm->execute();
    }

    public function UltimaCompra(){
        $stm = $this->db->prepare("CALL SP_ultimaCompra()");
        $stm->execute();
        return $stm->fetch();
    }
}
