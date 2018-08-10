<?php 
    
    include('Sistema/Configuracion.php');
    $validation=$usuario->ValidarUsuario();
    
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Proyecto PHP | Log in</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo URLBASE?><?php echo ESTATICO?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo URLBASE?><?php echo ESTATICO?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo URLBASE?><?php echo ESTATICO?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo URLBASE?><?php echo ESTATICO?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo URLBASE?><?php echo ESTATICO?>css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Proyecto<b>PHP</b></a>
            <small>Proyecto de Ventas en PHP</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" action="#" method="POST">
                    <div class="msg">Iniciar Sessión</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="user" placeholder="Usuario" value="<?php echo $validation ?>" required  autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="pass" placeholder="Password" required>
                        </div>
                    </div>
                    <?php 
                    
                        if($validation<>"" ){
                            echo '<div class="row">';
                            echo '<div class="col-xs-12">';
                            echo '<p class="text-danger text-center">Usuario o clave invalida</p>';
                            echo '</div>';
                            echo '</div>';
                        }
                    ?>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-blue waves-effect" name="sesionPost" type="submit">INGRESAR</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo URLBASE?><?php echo ESTATICO?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo URLBASE?><?php echo ESTATICO?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo URLBASE?><?php echo ESTATICO?>plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo URLBASE?><?php echo ESTATICO?>plugins/jquery-validation/jquery.validate.js"></script>
    <script src="<?php echo URLBASE?><?php echo ESTATICO?>plugins/jquery-validation/jquery.validate.js"></script>
    <script src="<?php echo URLBASE?><?php echo ESTATICO?>plugins/jquery-validation/localization/messages_es.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo URLBASE?><?php echo ESTATICO?>js/admin.js"></script>
    <script src="<?php echo URLBASE?><?php echo ESTATICO?>js/pages/examples/sign-in.js"></script>
</body>

</html>
