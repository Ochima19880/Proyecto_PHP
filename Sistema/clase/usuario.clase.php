<?php

require_once (MODELO . 'mdUsuario.Modelo.php');

class Usuario {

    public function ValidarUsuario() {
        if (isset($_POST['sesionPost'])) {
            $user = new mdUsuario();
            $user->Usuario = isset($_POST['user']) ? $_POST['user'] : null;
            $pass = isset($_POST['pass']) ? $_POST['pass'] : null;
            $user->Contrasena = sha1(strtoupper($user->Usuario) . ":" . strtoupper($pass));
            $UserRows = $user->ValidarUsuario($user);
            if ($UserRows == 1) {
                $_SESSION['usuario'] = $user->Usuario;
                header("Location: " . URLBASE . "index.php");
                exit;
            } else {
                $_POST['sesionPost'] = null;
                return $user->Usuario;
            }
        } else {
            return "";
        }
    }

    public function CerrarSession() {
        $_SESSION = array();
        session_unset();
        session_destroy();
        header("Location: " . URLBASE . "Login.php");
    }

    public function LoginCuentaConsulta() {
        global $userSession;
        global $usuarioApp;
        global $_SESSION;
        $userSession = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
        $usuarioApp = (new mdUsuario())->GetByNameHab($userSession);
    }

    public function VerificarCuenta() {
        global $usuarioApp;
        // La sesion no puede estar vacia
        if (isset($_SESSION['usuario']) == '') {
            header("Location: " . URLBASE . "Login.php");
            exit();
        }
        // Regenerar los identificadores de sesión para sesiones nuevas
        if (isset($_SESSION['mark']) === false) {
            session_regenerate_id(true);
            $_SESSION['mark'] = true;
        }
    }
    
    public function UpdateUser($user) {
        if (isset($user)) {            
            $count=$user->Update($user->idUsuario, $user);
            if($count>0){
                $this->LoginCuentaConsulta();
                return true;
            } else {
                return false;
            }
        }
    }

//    public function UpdateUser($data) {
//        if (isset($_POST['ProfilePost'])) {
//            $user = new mdUsuario();
//            $id=isset($_POST['idUsuario']) ? $_POST['idUsuario'] : null;
//            $user->Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : null;
//            $user->Apellido = isset($_POST['Apellido']) ? $_POST['Apellido'] : null;
//            $user->Email = isset($_POST['Email']) ? $_POST['Email'] : null;
//            $user->Telefono = isset($_POST['Telefono']) ? $_POST['Telefono'] : null;
//            $user->Habilitado=true;
//            print_r($user->Nombre);
//            if (!empty($_FILES)) {
//                echo 'llego';
//                if($_FILES['Foto']['type']=="image/png"){
//                    $File="USER_" . $id .".png";
//                }elseif ($_FILES['Foto']['type']=="image/jpeg") {
//                    $File="USER_" . $id .".jpg";
//                }
//                $user->Foto = $File ? ESTATICO."IMAGENES/".$File : null;
//            }
//            
//            $count=$user->Update($id, $user);
//            if($count>0){
//                if (!empty($_FILES)) {
//                    $tempFile = $_FILES['Foto']['tmp_name'];  
//                    $targetFile = URLBASE.IMGAGENES . $File; 
//                    move_uploaded_file($tempFile, $targetFile); 
//                }
//                $this->LoginCuentaConsulta();
////                header("Location: " . URLBASE . "UserProfile.php?q=OK");
//                return true;
//                
//            } else {
//                 header("Location: " . URLBASE . "UserProfile.php");
//                return false;
//            }
//            
//        }
//    }

}
