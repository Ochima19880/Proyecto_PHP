<?php

include('Sistema/Configuracion.php');
require_once (MODELO . 'mdUsuario.Modelo.php');
if (isset($_POST["Accion"])) {
    if ($_POST["Accion"] == "UpdUserProfile") {
        if (!empty($_FILES)) {
            $user = new mdUsuario();
            $user->idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : null;
            $user->Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : null;
            $user->Apellido = isset($_POST['Apellido']) ? $_POST['Apellido'] : null;
            $user->Email = isset($_POST['Email']) ? $_POST['Email'] : null;
            $user->Telefono = isset($_POST['Telefono']) ? $_POST['Telefono'] : null;
            $user->Habilitado = true;
            if ($_FILES['Foto']['type'] == "image/png") {
                $File = "USER_" . $user->idUsuario . ".png";
            } elseif ($_FILES['Foto']['type'] == "image/jpeg") {
                $File = "USER_" . $user->idUsuario . ".jpg";
            }
            $user->Foto = $File ? ESTATICO . "IMAGENES/" . $File : null;
        } else {
            $user->Foto = isset($_POST['Foto']) ? $_POST['Foto'] : null;
            ;
        }
        try {
            $result = $usuario->UpdateUser($user);
            if ($result) {
                if (!empty($_FILES)) {
                    $tempFile = $_FILES['Foto']['tmp_name'];
                    $targetFile = URLBASE . IMGAGENES . $File;
                    move_uploaded_file($tempFile, $targetFile);
                }
                $jsondata['success'] = true;
                $jsondata['message'] = 'Se guardo correctamente el registro';
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($jsondata);
                exit();
            }
        } catch (Exception $ex) {
            $jsondata['success'] = false;
            $jsondata['message'] = $ex->getMessage();
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);
            exit();
        }
    } elseif ($_POST["Accion"] == "CambiarClave") {
        try {
            $user = new mdUsuario();
            $user->idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : null;
            $user->Usuario = isset($_POST['Usuario']) ? $_POST['Usuario'] : null;
            $pass = isset($_POST['Password']) ? $_POST['Password'] : null;
            $user->Contrasena = sha1(strtoupper($user->Usuario) . ":" . strtoupper($pass));
            $result = $usuario->CambiarPassword($user->idUsuario, $user->Contrasena);
            echo $result;
//            if ($result) {
//                $jsondata['success'] = true;
//                $jsondata['message'] = 'Se actualizo correctamente el password';
//                header('Content-type: application/json; charset=utf-8');
//                echo json_encode($jsondata);
                exit();
//            }
        } catch (Exception $ex) {
            $jsondata['success'] = false;
            $jsondata['message'] = $ex->getMessage();
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);
            exit();
        }
    } else {
        $jsondata['success'] = true;
        $jsondata['message'] = 'Accion Vacio';
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata);
        exit();
    }
}
    