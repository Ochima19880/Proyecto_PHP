<?php 
    include('Sistema/Configuracion.php');
    $validation=$usuario->ValidarUsuario();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Proyecto PHP | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo URLBASE?><?php echo ESTATICO?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo URLBASE?><?php echo ESTATICO?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo URLBASE?><?php echo ESTATICO?>/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo URLBASE?><?php echo ESTATICO?>/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo URLBASE?><?php echo ESTATICO?>/plugins/iCheck/square/blue.css">
  
  
<!--   HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries 
   WARNING: Respond.js doesn't work if you view the page via file:// 
  [if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]

   Google Font 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Proyecto</b>PHP</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar Sessión</p>

    <form action="#" method="post">
      <div class="form-group has-feedback">
          <input type="text" name="user" required class="form-control" placeholder="Usuario" value="<?php echo $validation ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" name="pass" required class="form-control" placeholder="Password" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
         <?php 
        if($validation<>"" ){
            echo '<div class="row">';
            echo '<p class="text-danger text-center">Usuario o clave invalida</p>';
            echo '</div>';
        }
    ?>
        
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-offset-3 col-xs-6">
            <button type="submit" href="#" name="sesionPost" class="btn btn-primary btn-block btn-flat"><i class="glyphicon glyphicon-log-in"></i> Iniciar Sesi&oacute;n</button>
        </div>
        <!-- /.col -->
        
        
      </div>
    </form>  
   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php $prueba?>
<!-- jQuery 3 -->
<script src="<?php echo URLBASE?><?php echo ESTATICO?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo URLBASE?><?php echo ESTATICO?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo URLBASE?><?php echo ESTATICO?>/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
