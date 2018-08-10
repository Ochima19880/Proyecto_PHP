<?php
require_once (MODELO.'DbObjet.php');  
class mdProveedor extends conexion implements DbObjet  {
    public $idProveedor;
    public $nombre;
    public $telefono; 
    public $contacto;
    public $direccion;
    public $habilitado;

    public function Delete($param) {
        $this->Prepare("Delete From Proveedores where idProveedor=? ",$param); 
        return $this->num_rows();
    }

    public function GetAll() {
        $this->Prepare("Select * From Proveedores ");
        $Result= $this->fetch();
        return $Result;
    } 
    
    public function GetAllHab() {
        $this->Prepare("Select * From Proveedores where habilitado=1");
        $Result= $this->fetch();
        return $Result;
    } 

    public function GetById($param) {
        $this->Prepare("Select * From Proveedores where idProveedor=? ",$param);  
        $Result= $this->fetch();
        return $Result;
    }
    
    public function GetByIdHab($param) {
        $this->Prepare("Select * From Proveedores where idProveedor=? and habilitado=1 ",$param);  
        $Result= $this->fetch();
        return $Result;
    }
    
    public function Insert($Cat) {
        $param=(array)$Cat;        
        $this->Prepare("insert into Proveedores (nombre,telefono,contacto,direccion,habilitado) values (:nombre,:telefono,:contacto,:direccion,:habilitado)",$param);
        return $this->num_rows();
    }

    public function Update($id,$Cat) {
        $param=(array)$Cat;
        $param["idProveedor1"]=$id;
        $this->Prepare("update Proveedores set nombre:nombre,telefono=:telefono,contacto=:contacto,direccion=:direccion,habilitado=:habilitado where idProveedor=:idProveedor1",$param);
        return $this->num_rows();
    }
}
