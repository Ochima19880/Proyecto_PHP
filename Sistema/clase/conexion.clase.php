<?php

class Conexion {  
    private $conn;
    private  $prepare;
    function __construct(){
        
    }
    
    private function Conectar() {
        try {
            $this->conn=new PDO("mysql:host=" . HOST . ";dbname=" .DB . "", USER,PASSWORD  );

            return $this->conn;
        } catch (PDOException $e) {
            die("Error al conectar con la base de datos: " . $e->getMessage() . "<br/>");
        }  
        
    }
      
    public function Prepare($query,$params = null){
        $this->prepare=$this->Conectar()->prepare($query);  
        $this->prepare->execute($params);    
    }
    
    public function num_rows() {
        return $this->prepare->rowCount();
    }
    
     public function fetch($param=null) {
        return $this->prepare->fetch($param);
    }
    
    
    public function SQL($sqlconsulta){
        return $this->Conectar()->query($sqlconsulta);
    }
        
}
