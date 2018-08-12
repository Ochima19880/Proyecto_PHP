
<?php
include('Sistema/Configuracion.php');
require_once (MODELO.'mdUsuario.Modelo.php');  
//$user=new mdUsuario();        
//$user->Usuario="Maestro";      
////$user->Contrasena=sha1(strtoupper($user->Usuario) . ":" . strtoupper("123456"));; 
//$user->Nombre="Wilfran Adolfo";      
//$user->Apellido="Escalona Valencia";      
//$user->Email="wescalona@vva.net";      
//$user->Foto=URLBASE.ESTATICO."images/user.png";      
//$user->Habilitado=true;
//
//$pass="123456";
//$user->Contrasena=sha1(strtoupper($user->Usuario) . ":" . strtoupper($pass));
//
//$UserRows=$user->ValidarUsuario($user);
//if ($UserRows == 1) {
//    echo 'Validado';
//}
//else{
//    echo 'Usuario Invalido';
//}

//$count=$user->Insert($user);
//if ($count > 0) {
//    $result = $user->GetByNameHab($user->Usuario);
//    if ($result) {
//        foreach ($result as $key => $value) {
//            echo "Campo: " . $key . " Valor: " . $value;
//            echo '</br>';
//        }
//    }
//}

//$count=$user->Insert($user);
//echo $count;
//if($count>0){
//    $result=$user->GetAll();
//
//    foreach ($result as $row){
//        print_r($row);
//        echo '</br>';
//    }
//    foreach ($result as $row){
//         echo '************</br>';
//        foreach ($row as $key => $value) {
//        echo "Campo: " . $key . " Valor: " . $value;
//        echo '</br>';
//        }
//    }
//}

//
//
//$server = "localhost";
//$user = "root";
//$password = "";
//$dbname = "proyecto_php";
//
//try {
//    $mbd = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);
//    $user=new mdUsuario();        
//    $user->Usuario="Maestro";      
//    $user->Contrasena=sha1(strtoupper($user->Usuario) . ":" . strtoupper("123456"));; 
//    $user->Nombre="Wilfran A";      
//    $user->Apellido="Escalona V";      
//    $user->Email="wescalona@prueba.net";      
//    $user->Foto=URLBASE.ESTATICO."images/user.png";      
//    $user->Habilitado=true; 
//    $count=$user->Insert($user);
//    echo $count;
//    /*
//     * 
//     * 
//     */
//    
////    $sentencia = $mbd->prepare("update proyecto_php.usuarios set Nombre=:Nombre,Apellido=:Apellido,Email=:Email,Foto=:Foto where idUsuario=:idUsuario1;");
////    $param = array_diff_key (get_object_vars($user), array('idUsuario'=>"",'Usuario'=>"",'Contrasena'=>"",'Habilitado'=>""));
////    $param["idUsuario1"]=10;
////    foreach ($param as $key => $value) {
////        echo "Campo: " . $key . " Valor: " . $value;
////        echo '</br>';
////    }
////    $sentencia->bindParam(":Nombre", $param["Nombre"]);
////    $sentencia->bindParam(":Apellido", $param["Apellido"]);
////    $sentencia->bindParam("Email", $param["Email"]);
////    $sentencia->bindParam("Foto", $param["Foto"]);
////    $sentencia->bindParam("idUsuario", $param["idUsuario1"]);
//////
////    // insertar una fila
//        $sentencia->execute($param);
//      $num=$sentencia->rowCount(); 
//      print_r($num);
//    while ($fila = $sentencia->fetch(null)) {
//        print_r("hola");
//        print_r($fila);
//    }
//    
//    $mbd = null;
//} catch (PDOException $e) {
//    print "¡Error!: " . $e->getMessage() . "<br/>";
//    die();
//}