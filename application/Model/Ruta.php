<?php

namespace Mini\Model;

use Mini\Core\Model;

class ruta extends Model{

    private $id_ruta;
    private $nombre_ruta;
    private $id_barrio;
    private $nombre_barrio;
    private $id_municipio;
    private $nombre_municipio;
    private $estado;
 

    public function __SET($attr, $valor){
        $this->$attr=$valor;
    }

    public function __GET($attr){
        return $this->$attr;
        
    }

    public function crear(){
        
        $stm = $this->db->prepare("CALL Guardar_Rutas(?,?,?)");
        $stm->bindParam(1, $this->nombre_ruta);
        $stm->bindParam(2, $this->id_barrio);
        $stm->bindParam(3, $this->id_municipio);
        //$stm->bindParam(4, $this->estado);
      
       return $stm->execute();
    }

    public function modificar(){
        $stm = $this->db->prepare("CALL Modificar_Rutas(?,?,?,?)");
        $stm->bindParam(1, $this->nombre_ruta);
        $stm->bindParam(2, $this->id_barrio);
        $stm->bindParam(3, $this->id_municipio);
        $stm->bindParam(4, $this->id_ruta);
        
        return $stm->execute();
    }

    public function editar(){
        $stm = $this->db->prepare("CALL Editar_Rutas(?)");
        $stm->bindParam(1, $this->id_ruta);
        $stm->execute();
        return $stm->fetch();
    }

    public function cambiar_estado(){
        $stm = $this->db->prepare("CALL Cambiar_Estado_Rutas(?,?)");
        $stm->bindParam(1, $this->estado);
        $stm->bindParam(2, $this->id_ruta);
        return $stm->execute();
    }

    public function listar(){
        $stm = $this->db->prepare("CALL Listar_Rutas()");
        $stm->execute();
        return $stm->fetchAll();
    }
    public function listarMunicipio(){
        $stm = $this->db->prepare("CALL Listar_Municipio()");
        $stm->execute();
        return $stm->fetchAll();
    }
    
    
    public function listar_municipio_barrioo(){
        $stm = $this->db->prepare("CALL Listar_Barrio()");
        $stm->execute();
        return $stm->fetchAll();
    }

    public function listar_municipio_barrio(){
        $stm = $this->db->prepare("CALL Listar_Barrio_Municipio(?)");
        $stm->bindParam(1,$this->id_barrio);
        $stm->execute();
        return $stm->fetchAll();
    }
    
    public function mostrar_rutas(){
        $stm = $this->db->prepare("CALL Mostrar_rutas()");
        $stm->execute();
        return $stm->fetchAll();
    }

    public function buscar_ruta(){
        $stm = $this->db->prepare("CALL Buscar_Rutas(?)");
        $stm->bindParam(1,$this->nombre_ruta);
        $stm->execute();
        return $stm->fetchAll();
    }
}