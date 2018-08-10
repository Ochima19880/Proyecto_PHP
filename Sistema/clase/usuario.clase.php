<?php
require_once (MODELO.'mdUsuario.Modelo.php');  
class Usuario  {  
       
    public function ValidarUsuario(){
        if(isset($_POST['sesionPost'])){
//            $sha_pass_hash=sha1(strtoupper($userpost) . ":" . strtoupper($passpost));            
            $user=new mdUsuario();
            $user->usuario=isset($_POST['user'])?$_POST['user']:null;
            $user->contrasena=isset($_POST['pass'])?$_POST['pass']:null;
            $UserRows=$user->ValidarUsuario($user);
            if ($UserRows == 1) {
                $_SESSION['usuario']=  $user->usuario;
                header("Location: ".URLBASE."index.php");
                exit;
            }
            else{
                $_POST['sesionPost']=null;
                return $user->usuario;
            }
        } 
        else{
            return "";
        }          
        
    }
    
    public function LoginCuentaConsulta(){
        global $userSession;
        global $usuarioApp;
        global $_SESSION;
        $userSession=isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
        $user=new mdUsuario();        
        $usuarioApp= $user->GetByIdHab(array($userSession));
        
    }
    
    
    public function VerificarCuenta(){
        global $usuarioApp;
        // La sesion no puede estar vacia
        if(isset($_SESSION['usuario']) == ''){
                header("Location: ".URLBASE."Login.php");
                exit();
        }
        // Regenerar los identificadores de sesión para sesiones nuevas
        if (isset($_SESSION['mark']) === false)
        {
                session_regenerate_id(true);
                $_SESSION['mark'] = true;
        }
    }

    

}