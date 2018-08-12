<?php session_start();
include('Sistema/Configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificarCuenta();
?>

<?php include(MODULO . 'part1.php'); ?> 


<div class="container-fluid">
    <div class="block-header">
        <h2>MODULO</h2>
        <?php
        

        ?>
    </div>

</div>

<?php include(MODULO . 'part2.php'); ?> 
