<?php

class Conexion {  
    private $conn;
    private  $prepare;
    function __construct(){
        
    }
    
    private function Conectar() {
        try {
            $this->conn=new PDO("mysql:host=" . HOST . ";dbname=" .DB . "", USER,PASSWORD  );
//            $this->conn->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die("Error al conectar con la base de datos: " . $e->getMessage() . "<br/>");
        }  
    }
      
    public function Prepare($query,$params = null){
        try{
            $this->prepare=$this->Conectar()->prepare($query);  
            $this->prepare->execute($params);    
        }catch(PDOException $e){
             die("ERROR: " . $e->getMessage());
        }
    }
       
    
    public function num_rows() {
        try{
            return $this->prepare->rowCount();
        }catch(PDOException $e){
            die("ERROR: " . $e->getMessage());
        }        
    }
    
     public function fetch($param=null) {
        try{
            return $this->prepare->fetch($param);
        }catch(PDOException $e){
            die("ERROR: " . $e->getMessage());
        }
        
    }
    
    public function fetchAll() {
        try{
            return $this->prepare->fetchAll();
        }catch(PDOException $e){
            die("ERROR: " . $e->getMessage());
        }        
    }
    
    public function SQL($sqlconsulta){
        return $this->Conectar()->query($sqlconsulta);
    }
        
}
