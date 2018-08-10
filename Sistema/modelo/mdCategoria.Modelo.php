<?php
require_once (MODELO.'DbObjet.php');  
class mdCategoria extends conexion implements DbObjet  {
    public $idDepartamento;
    public $departamento;
    public $habilitada;

    public function Delete($param) {
        $this->Prepare("Delete From Departamentos where idDepartamento=? ",$param); 
        return $this->num_rows();
    }

    public function GetAll() {
        $this->Prepare("Select * From Departamentos ");
        $Result= $this->fetch();
        return $Result;
    } 
    
    public function GetAllHab() {
        $this->Prepare("Select * From Departamentos where habilitada=1");
        $Result= $this->fetch();
        return $Result;
    } 

    public function GetById($param) {
        $this->Prepare("Select * From Departamentos where idDepartamento=? ",$param);  
        $Result= $this->fetch();
        return $Result;
    }
    
    public function GetByIdHab($param) {
        $this->Prepare("Select * From Departamentos where idDepartamento=? and habilitada=1 ",$param);  
        $Result= $this->fetch();
        return $Result;
    }
    
    public function Insert($Cat) {
        $param=(array)$Cat;        
        $this->Prepare("insert into Departamentos (departamento,habilitada) values (:departamento,:habilitada)",$param);
        return $this->num_rows();
    }

    public function Update($id,$Cat) {
        $param=(array)$Cat;
        $param["idCategoria1"]=$id;
        $this->Prepare("update Departamentos set departamento:departamento,habilitada=:habilitada where idDepartamento=:idDepartamento1",$param);
        return $this->num_rows();
    }

}
