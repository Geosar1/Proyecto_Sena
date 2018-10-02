<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= URL ?>/public/css/bootstrap-yeti.css">
    <link rel="stylesheet" href="<?= URL ?>/public/css/Login.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="<?= URL ?>/public/css/modal.css">
=======
>>>>>>> origin/master
    <link rel="stylesheet" href="<?= URL ?>/public/font-awesome/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="popupunder alert alert-success fade in">Ingresa tus datos de seguridad</div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="popupunder alert alert-fail fade in"><strong>Success : </strong> The update process has been completed successfull!</div>
        </div>
    </div>

    <div class="row">
        <div class="row-fluid">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3" style="margin-top: 100px;">
                <div class="panel-login">
                    <div class="panel-body" id="principal">
                        <form class="form-signin" id="formlogin">
                            <div class="col-md-6  col-md-offset-3">
                                <img src=" <?= URL ?>/public/img/logoSmartDistri.png" class="img-responsive">
                            </div>
                            <br>
                            <div class="col-md-9">
                                <h4 class="color-light">Bienvenido</h4>
                                <p class="color-light">Ingresa tus credenciales.</p>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <br>
                                <div class="errores" id="mensaje1">
                                    <p class="text-danger">Introduce tu usuario.</p>
                                </div>

                                <div class="input-group" id="campo1"><span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input type="text" name="usu" id="user" class="form-control form-login btn-block" placeholder="Usuario" autocomplete="off" autofocus />
                                </div>
                                <br>
                                <div class="errores" id="mensaje2">
                                    <p class="text-danger">Introduce tu contraseña.</p>
                                </div>
                                <p class="color-light" id="mensaje_recuperacion">Ingrese fecha de expedición de su cédula.</p>
                                <div class="input-group" id="campo2">
                                    <span class="input-group-addon"><i class="fa fa-lock " aria-hidden="true"></i></span>
                                    <input type="password" name="pwd" id="key" class="form-control form-login btn-block" placeholder="Contraseña" autocomplete="off" />
                                </div>
                                <br>
                                <div class="col-lg-4 col-lg-offset-8">
                                    <div class="form-group" id="campoapaterno">
                                        <button id="entrar" type="submit" class="btn btn-primary btn-block">Ingresar</button>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-lg-offset-8">
                                    <div class="form-group" id="campoapaterno">
                                        <button id="recuperar" type="button" class="btn btn-primary btn-block">Recuperar</button>
                                    </div>
                                </div>
                                <br> <br> <br>
                                <div class="col-lg-8 col-lg-offset-4" style="margin:center">

                                    <a id="sele">¿Olvidaste la contraseña?</a>
                                    <input type="checkbox" id="recordar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var uri = "<?=URL?>";
    </script>

    <div id="simpleModalPass" class="modal">
        <div class="modal-content">
            <div id="header-modal">
                <h3>Modificar Contraseña</h3>
            </div>
            <div class="modal-body">
                <label>Ingrese la nueva Contraseña</label>
                <input id="cambiopass" class="form-control" name="txtcambiopass" type="text" maxlength="32" autocomplete="off" required> <br>
                <input class="succes" id="btcambiarpass" type="button" value="Modificar"><br>
            </div>
            <div id="footer-modal">
                <button id="volverpass" type="button">Cerrar</button>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?= URL?>/public/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= URL?>/public/js/login.js"></script>
    <script type="text/javascript" src="<?= URL?>/public/js/metodos.js"></script>
    <script type="text/javascript" src="<?= URL?>/public/js/alertas.js"></script>
</body>

</html>
