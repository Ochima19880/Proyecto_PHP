<?php
require_once (MODELO.'DbObjet.php');  
class mdUsuario extends conexion implements DbObjet {
   
    public $idUsuario;
    public $Usuario;
    public $Telefono;
    public $Contrasena;
    public $Nombre;
    public $Apellido;
    public $Email;   
    public $Foto;
    public $Habilitado;
    


    public function Delete($param) {
        $this->Prepare("Delete From usuarios where IdUsuario=? ",array($param)); 
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
        $this->Prepare("Select * From usuarios where idUsuario=?",array($param));  
        $Result= $this->fetch();
        return $Result;
    }
    public function GetByName($param) {
        $this->Prepare("Select * From usuarios where Usuario=?",array($param));  
        $Result= $this->fetch();
        return $Result;
    }
    
    public function GetByIdHab($param) {
        
        $this->Prepare("Select * From usuarios where idUsuario=? and Habilitado=1",array($param));  
        $Result= $this->fetch();
        return $Result;
    }
    
    public function GetByNameHab($param) {
        
        $this->Prepare("Select * From usuarios where Usuario=? and habilitado=1",array($param));  
        $Result= $this->fetch();
        return $Result;
    }

    public function Insert($Usuario) {
        $param = array_diff_key (get_object_vars($Usuario), array('idUsuario'=>""));
        
        $this->Prepare("insert into usuarios (Usuario,Contrasena,Nombre,Apellido,Email,Foto,Telefono,Habilitado) " . 
                       "values (:Usuario,:Contrasena,:Nombre,:Apellido,:Email,:Foto,:Telefono,:Habilitado)",$param);
        return $this->num_rows();
    }

    public function Update($id,$Usuario) {
        $param = array_diff_key (get_object_vars($Usuario), array('idUsuario'=>"",'Usuario'=>"",'Contrasena'=>"",'Habilitado'=>""));
        $param["idUsuario1"]=$id;
        
        $this->Prepare("update proyecto_php.usuarios set Nombre=:Nombre,Apellido=:Apellido,Email=:Email,Foto=:Foto,Telefono=:Telefono where idUsuario=:idUsuario1;",$param);
        return $this->num_rows();
    }
    
    public function ValidarUsuario($Usuario) {
        $this->Prepare("Select usuario,contrasena From usuarios where usuario=? and contrasena=? and habilitado=1",array($Usuario->Usuario,$Usuario->Contrasena));                    
        return $this->num_rows();
    }
    
}

