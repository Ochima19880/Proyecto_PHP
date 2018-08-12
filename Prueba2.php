<?php
session_start();
include('Sistema/Configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificarCuenta();
?>
<!DOCTYPE html>
<head>
    <?php include(MODULO . 'head.php'); ?> 
    <!-- Dropzone Css -->
    <link href="<?php echo URLBASE ?><?php echo ESTATICO ?>plugins/dropzone/dropzone.css" rel="stylesheet">
</head>
<body>
   <?php  echo SISTEMA. IMGAGENES;?>
    <!-- 3 -->
    <form action="UploadFileImg.php" class="dropzone"></form>

    <?php include(MODULO . 'scriptBase.php'); ?> 
    <!-- Dropzone Plugin Js -->
    <script src="<?php echo URLBASE ?><?php echo ESTATICO ?>plugins/dropzone/dropzone.js"></script>
</body>
</html>
