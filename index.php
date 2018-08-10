<?php include('Sistema/Configuracion.php');
    $usuario->VerificarCuenta();
    $usuario->LoginCuentaConsulta()
?>

<?php include(MODULO.'part1.php');?> 

   
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
        
        <?php 
            echo $usuarioApp["usuario"];
            echo $_SESSION['usuario'];
            echo ($usuarioApp);
        ?>
    </div>

</div>

<?php include(MODULO.'part2.php');?> 


