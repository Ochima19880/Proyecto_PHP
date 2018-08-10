<?php
require_once (MODELO.'DbObjet.php');  
class mdUsuario extends conexion implements DbObjet {
   
    public $usuarioId;
    public $usuario;
    public $contrasena;
    public $nombre;
    public $apellido1;
    public $apellido2;
    public $local;
    public $direccion;   
    
    public function Delete($param) {
        $this->Prepare("Delete From usuarios where usuario=? ",$param); 
        return $this->num_rows();
    }

    public function GetAll() {
        $this->Prepare("Select * From usuarios");
        $Result= $this->fetchAll();
        return $Result;
    }
    public function GetAllHab() {
        $this->Prepare("Select * From usuarios where habilitado=1");
        $Result= $this->fetchAll();
        return $Result;
    }

    public function GetById($param) {
        $this->Prepare("Select * From usuarios where usuario=?",$param);  
        $Result= $this->fetch();
        return $Result;
    }
    
    public function GetByIdHab($param) {
        $this->Prepare("Select * From usuarios where usuario=? and habilitado=1",$param);  
        $Result= $this->fetch();
        return $Result;
    }

    public function Insert($Usuario) {
        $param=(array)$Usuario;        
        $this->Prepare("insert into usuarios (usuario,contrasena,nombre,apellido1,apellido2,local,direccion,habilitado) " . 
                       "values (:usuario,:contrasena,:nombre,:apellido1,:apellido2,:local,:direccion,1)",$param);
        return $this->num_rows();
    }

    public function Update($id,$Usuario) {
        $param=(array)$Usuario;
        $param["usuario1"]=$id;
        $this->Prepare("update usuarios set nombre:nombre,apellido1=:apellido1,apellido2=:apellido2,local=:local,direccion:=direccion " .
                " where usuario=:usuario1",$param);
        return $this->num_rows();
    }
    
    public function ValidarUsuario($Usuario) {
        $this->Prepare("Select usuario,contrasena From usuario where usuario=? and contrasena=? and habilitado=1",array($Usuario->usuario,$Usuario->contrasena));                    
        return $this->num_rows();
    }
    
}

