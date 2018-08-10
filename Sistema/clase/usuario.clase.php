<?php

class Usuario extends Conexion {
    
    public function ValidarUsuario(){
        if(isset($_POST['sesionPost'])){
          
            $userpost=isset($_POST['user'])?$_POST['user']:null;
            $passpost=isset($_POST['pass'])?$_POST['pass']:null;
//            $sha_pass_hash=sha1(strtoupper($userpost) . ":" . strtoupper($passpost));            
            
            $this->Prepare("Select usuario,contrasena From usuario where usuario=? and contrasena=? and habilitado=1",array($userpost,$passpost));                    
            $UserRows= $this->num_rows();
            if ($UserRows == 1) {
                $_SESSION['usuario']=  isset($_POST['user']) ? $_POST['user'] : null;
                header("Location: ".URLBASE."index.php");
                exit;
            }
            else{
                $_POST['sesionPost']=null;
                return $userpost;
            }
            
        } 
        else{
            return "";
        }          
        
    }
    
    function Validado() {
        if(!isset($_SESSION['usuario'])){
            header("Location: ".URLBASE."Login.php");
        }
    }
    
    
    
}