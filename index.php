<?php session_start();
include('Sistema/Configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificarCuenta();
?>
<!DOCTYPE html>
<head>
    <?php include(MODULO . 'head.php'); ?> 
    <!-- Dropzone Css -->
    <link href="<?php echo URLBASE?><?php echo ESTATICO?>plugins/dropzone/dropzone.css" rel="stylesheet">
</head>
<?php include(MODULO . 'part1.php'); ?> 


<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>

        <?php
        if($usuarioApp){
            foreach ($usuarioApp as $key => $value) {
                echo "Campo: " . $key . " Valor: " . $value;
                echo '</br>';
            }
        }

        ?>
    </div>

</div>

 </section>

    <?php include(MODULO.'scriptBase.php');?> 


</body>


