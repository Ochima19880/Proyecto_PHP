<?php
session_start();
include('Sistema/Configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificarCuenta();
//$usuario->UpdateUser();
$Act = isset($_GET['msg']) ? $_GET['msg'] : null;
?>
<!DOCTYPE html>
<head>
    <?php include(MODULO . 'head.php'); ?> 
    <script>
        history.pushState(null, "", "UserProfile.php");
    </script>
</head>
<?php include(MODULO . 'part1.php'); ?> 


<div class="container-fluid">
    <div class="block-header">
        <h2>PERFIL DE USUARIO</h2>
    </div>
    <!-- Input -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        <?php echo $usuarioApp["Nombre"] . " " . $usuarioApp["Apellido"]; ?>
                    </h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form class="form"  action="#" method="post" id="UserPorfileForm"  >
                            <div class="col-sm-4">
                                <div class="text-center">
                                    <img src="<?php echo $usuarioApp["Foto"]; ?>" id="uploadForm" class="avatar img-circle img-thumbnail" width="100" height="100" alt="avatar">
                                    <h6>Cargar Foto Perfil...</h6>
                                    <input type="file" id="Foto"  class="btn bg-blue waves-effect file-upload">

                                </div></hr><br>
                            </div>
                            <div class="col-sm-6">

                                <input type="text" class="hidden"  name="idUsuario" value="<?php echo $usuarioApp["idUsuario"] ?>">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                    <li role="presentation" class="active"><a href="#Personal" data-toggle="tab">Información Persona</a></li>
                                    <li role="presentation"><a href="#Seguridad" data-toggle="tab">Seguridad</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="Personal">
                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="Nombre"><h4>Nombres</h4></label>
                                                <input type="text" class="form-control" name="Nombre" id="Nombre" required placeholder="Ingrese nombres" title="Ingrese nombres" value="<?php echo $usuarioApp["Nombre"] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="Apellido"><h4>Apellidos</h4></label>
                                                <input type="text" class="form-control" name="Apellido" id="Apellido" required placeholder="Ingrese apellidos" title="Ingrese apellidos" value="<?php echo $usuarioApp["Apellido"] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="Telefono"><h4>Telefono</h4></label>
                                                <input type="text" class="form-control" name="Telefono" id="Telefono" placeholder="Ingrese el Telefono" title="Ingrese el Telefono" value="<?php echo $usuarioApp["Telefono"] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="Email"><h4>Email</h4></label>
                                                <input type="email" class="form-control" name="Email" id="Email" required placeholder="Correo@email.com" title="Ingrese su email" value="<?php echo $usuarioApp["Email"] ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="Seguridad">
                                        <div class="form-group">

                                            <div class="col-xs-12">
                                                <label for="Usuario"><h4>Usuario</h4></label>
                                                <input  type="text" class="form-control" name="Usuario" id="Usuario" placeholder="Ingrese Usuario" title="Ingrese Usuario" >
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="Password"><h4>Password</h4></label>
                                                <input type="password" class="form-control" name="Password" id="password" placeholder="password" title="enter your password.">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="password2"><h4>Verify</h4></label>
                                                <input type="password" class="form-control" name="password2" id="password2" placeholder="Confirmar pasword" title="Confirmar pasword">
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <br>
                                        <button class="btn btn-lg btn-success waves-effect" id="ProfilePost" type="submit" value=""><i class="glyphicon glyphicon-ok-sign"></i> Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- #END# Input -->

</div>

</section>

<?php include(MODULO . 'scriptBase.php'); ?> 
<script>
    $('#ProfilePost').click(function () {
        $("#UserPorfileForm").off('submit').on('submit', function () {
            var form = $(this);
            console.log(form[0]);
            var formData = new FormData(form[0]);
            var file2 = document.getElementById("Foto");
            var archivo = file2.files[0];
            formData.append("Foto",archivo);
            formData.append("Accion", "UpdUserProfile");
            jQuery.ajax({
                url: 'Procesos.php',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
            }).done(function(data){
                console.log(data);
                window.location.href = "<?php echo URLBASE?>UserProfile.php";
            });

            return false;
        });


        //var form = document.getElementById("UserPorfileForm");
        //var formData = new FormData(form);
        //formData.append("Accion","UpdUserProfile");
//        console.log(form);
//        return false;
    });



</script>

</body>