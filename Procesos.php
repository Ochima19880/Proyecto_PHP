<?php

include('Sistema/Configuracion.php');
require_once (MODELO . 'mdUsuario.Modelo.php');
if (isset($_POST["Accion"])) {
    if ($_POST["Accion"] == "UpdUserProfile") {

        $user = new mdUsuario();
        $user->idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : null;
        $user->Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : null;
        $user->Apellido = isset($_POST['Apellido']) ? $_POST['Apellido'] : null;
        $user->Email = isset($_POST['Email']) ? $_POST['Email'] : null;
        $user->Telefono = isset($_POST['Telefono']) ? $_POST['Telefono'] : null;
        $user->Habilitado = true;
        if (!empty($_FILES)) {
            echo 'llego';
            if ($_FILES['Foto']['type'] == "image/png") {
                $File = "USER_" . $user->idUsuario . ".png";
            } elseif ($_FILES['Foto']['type'] == "image/jpeg") {
                $File = "USER_" . $user->idUsuario . ".jpg";
            }
            $user->Foto = $File ? ESTATICO . "IMAGENES/" . $File : null;
        }
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
//            }
        }
    } else {
        $jsondata['success'] = true;
        $jsondata['message'] = 'Accion Vacio';
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata);
        exit();
    }
}
    