<?php
require_once (MODELO.'DbObjet.php');  
class mdProducto extends conexion implements DbObjet {
    public $idProducto;
    public $codigo;
    public $nombre;
    public $preciocosto;
    public $precioventa;
    public $proveedor;
    public $departamento;
    public $stock;
    public $stockMin;
    public $impuesto;
    public $medida;
    public $especificaciones;
    public $habilitado;
    
    public function __construct($idProducto,$codigo,$nombre,$preciocosto,$precioventa,$proveedor,$departamento,$stock,$stockMin,$impuesto,$medida,$especificaciones,$habilitado){
        parent::__construct();
        $this->idProducto=$idProducto;
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->preciocosto=isset($preciocosto)?$preciocosto:0;
        $this->precioventa=isset($precioventa)?$precioventa:0;
        $this->proveedor=isset($proveedor)?$proveedor:0;
        $this->departamento=isset($departamento)?$departamento:0;
        $this->stock=isset($stock)?$stock:0;
        $this->stockMin=isset($stockMin)?$stockMin:0;
        $this->impuesto=isset($impuesto)?$impuesto:0;
        $this->medida=isset($medida)?$medida:0;
        $this->especificaciones=isset($especificaciones)?$especificaciones:"";
        $this->habilitado=isset($habilitado)?$habilitado:false;
    }
    /*
    
     * 
     */
    public function Delete($param) {
        $this->Prepare("Delete From Productos where idProducto=? ",$param); 
        return $this->num_rows();
    }

    public function GetAll() {
        $this->Prepare("Select * From Productos ");
        $Result= $this->fetch();
        return $Result;
    }
    
    public function GetAllHab() {
        $this->Prepare("Select * From Productos where habilitado=1");
        $Result= $this->fetch();
        return $Result;
    }

    public function GetById($param) {
        $this->Prepare("Select * From Productos where idProducto=? ",$param);  
        $Result= $this->fetch();
        return $Result;
    }

    public function GetByCodi($param) {
        $this->Prepare("Select * From Productos where Codigo=? ",$param);  
        $Result= $this->fetch();
        return $Result;
    }
    
    public function Insert($Producto) {
        $param=(array)$Producto;        
        $this->Prepare("insert into Productos (codigo,nombre,preciocosto,precioventa,proveedor,departamento,stock,stockMin,impuesto,medida,especificaciones,habilitado) values (:codigo,:nombre,:preciocosto,:precioventa,:proveedor,:departamento,:stock,:stockMin,:impuesto,:medida,:especificaciones,:habilitado)",$param);
        return $this->num_rows();
    }

    public function Update($id,$Producto) {
        $param=(array)$Producto;
        $param["idProducto1"]=$id;
        $this->Prepare("update Productos set codigo:codigo,nombre=:nombre,preciocosto=:preciocosto,precioventa=:precioventa,proveedor:=proveedor,departamento=:departamento,stock=:stock,stockMin=:stockMin,impuesto=:impuesto,medida=:medida,especificaciones=:especificaciones,habilitado=:habilitado where idProducto=:idProducto1",$param);
        return $this->num_rows();
    }

    public function UpdateStock($id,$cantidad) {
        $param=array();
        $param["stock"]=$cantidad;
        $param["idProducto1"]=$id;
        $this->Prepare("update Productos set stock=stock + :stock where idProducto=:idProducto1",$param);
        return $this->num_rows();
    }
        
    

}
