<?php

$server = "localhost";
$user = "root";
$password = "";
$dbname = "proyecto_php";

try {
    $mbd = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);
    
    $sentencia = $mbd->prepare("Select usuario,contrasena From usuario where usuario=? and contrasena=? and habilitado=1");
    
//    $sentencia->bindParam(1, $nombre);
//    $sentencia->bindParam(2, $valor);
//
//    // insertar una fila
    $nombre = 'Wilfran';
    $valor = "123456";
    $sentencia->execute(array($nombre,$valor));
      $num=$sentencia->rowCount(); 
      print_r($num);
    while ($fila = $sentencia->fetch(null)) {
        print_r("hola");
        print_r($fila);
    }
    
    $mbd = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}