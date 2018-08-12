<?php session_start();
include('Sistema/Configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificarCuenta();
$usuario->CerrarSession();
?>


