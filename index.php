<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>

    <!--LIBRERIA ALERTIFY:-->
    <link rel="stylesheet" type="text/css" href="js/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="js/css//themes/default.css">

    <!--LIBRERIA JQUERY:-->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/alertify.js"></script>

    <!--FUENTE LETRA:-->
    <link rel="stylesheet" href="https://use.typekit.net/mdi6pgl.css">
    <!-- BOOTSTRAP: CSS:-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- PARA PODER USAR ICONOS
    link de la pagina: https://www.bootstrapcdn.com/fontawesome/: -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!--LLAMADO AL ESTILO CSS GUARDADO-->
    <link rel="stylesheet" type="text/css" href="css/styleLogin.css">


    <?php
    session_start();
    /*SI LA SESSION  ESTA DEFINIDA O EL USUARIO SE A LOGUEADO ME ENVIE DIRECTAMENTE A PRINCIPAL Y NO ME PERMITIRA INGRESAR AL INDEX MIENTRAS LA SESION SIGUE ABIERTA*/
    if (isset($_SESSION["confirmar"])) {
        header('location: principal.php');
    }
    ?>

</head>

<body background="img/fd.png">


    <!-- DISEÑO PRESENTACION LOGIN:-->
    <div class="container mt-4 col-lg-4">
        <div class="card">
            <div class="card-header">


                <FONT FACE="impact" size="4" COLOR="#548A76" style=" font-family:shuriken-std;">
                    <center>
                        <h1>ACCESO AL SISTEMA</h1>
                    </center>
                </FONT>
            </div>

            <div class="card-body">
                <form  method="POST">

                    <!--ICONO USER-->
                    <div class="icons fondo">
                        <input class="form-control" type="text" name="usuario" id="usuario" placeholder="USUARIO"><br>
                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                    </div>
                    <!--ICONO KEY-->

                    <div class="icons fondo">
                        <input class="form-control" type="password" name="clave" id="clave" placeholder="CONTRASEÑA"><br>
                        <i class="fa fa-key fa-lg fa-fw" aria-hidden="true"></i>
                    </div>
                    <center>
                        <div>
                            <input class="btn btn-success" type="submit" name="INGRESAR" value="INGRESAR" id="INGRESAR" />
                            <input class="btn btn-info" type="button" value="REGISTRARSE" onclick="window.location.href='php/registro.php';" />
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php
include("php/conexion.php");
//LLAMANDO A LA FUNCION->CONEXION:
$conexion = conexion();
//*******************************BUSCAR USUARIO***********************
if (isset($_POST['INGRESAR'])) {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['clave'];

    $ver = buscarUsu($usuario, $contraseña);
    $_SESSION['usu'] = $usuario;
    $_SESSION['usuario'] = $usuario;
    if ($ver > 0) {
        //SI AL SESSION ENTRA QUIERE DECIR QUE EL USUARIO SE A LOGUADO CORRECTAMENTE Y AHORA POSSE UNA SESSION
        $_SESSION["confirmar"] = true;
        header('location: principal.php');
        $_SESSION['usuario'] = $usuario;
    } else {
        echo '<script>alertify.alert("USUARIO O CONTRASEÑA INCORRECTA VERIFIQUE...");</script>';
    }
}
?>