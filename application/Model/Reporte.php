<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Reporte extends Model {

    private $id_ruta;
    private $fecha_inicio;
    private $fecha_fin;
    private $producto;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }
    
    public function buscar_reporteruta(){
        $stm = $this->db->prepare("CALL Buscar_reporteruta(?,?,?)");
        $stm->bindParam(1, $this->id_ruta);
        $stm->bindParam(2, $this->fecha_inicio);
        $stm->bindParam(3, $this->fecha_fin);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function buscar_reportevendidos(){
        $stm = $this->db->prepare("CALL Buscar_reporte_productosvendidos(?,?)");
        $stm->bindParam(1, $this->fecha_inicio);
        $stm->bindParam(2, $this->fecha_fin);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function buscar_reporteclientes(){
        $stm = $this->db->prepare("CALL Buscar_reporte_clientescompras(?,?)");
        $stm->bindParam(1, $this->fecha_inicio);
        $stm->bindParam(2, $this->fecha_fin);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function buscar_reportecomprados(){
        $stm = $this->db->prepare("CALL Buscar_reporte_productoscomprados(?,?)");
        $stm->bindParam(1, $this->fecha_inicio);
        $stm->bindParam(2, $this->fecha_fin);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function buscar_reportemovimientos(){
        $stm = $this->db->prepare("CALL Buscar_reportemovimientos(?,?,?)");
        $stm->bindParam(1, $this->fecha_inicio);
        $stm->bindParam(2, $this->fecha_fin);
        $stm->bindParam(3, $this->producto);
        $stm->execute();
        return $stm->fetchAll();
    }
}
