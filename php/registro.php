<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>


    <!--LIBRERIA ALERTIFY:-->
    <link rel="stylesheet" type="text/css" href="../js/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../js/css//themes/default.css">

    <!--LIBRERIA JQUERY:-->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/alertify.js"></script>

    <!--FUENTE LETRA:-->
    <link rel="stylesheet" href="https://use.typekit.net/mdi6pgl.css">
    <!-- BOOTSTRAP: CSS:-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- PARA PODER USAR ICONOS
               link de la pagina: https://www.bootstrapcdn.com/fontawesome/
               : -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--LLAMADO AL ESTILO CSS GUARDADO-->
    <link rel="stylesheet" type="text/css" href="../css/styleRegistro.css">
</head>

<body background="../img/rg.jpg">

    <CENTER>
        <!-- DISEÑO PRESENTACION TABLA:-->
        <div class="container mt-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <FONT FACE="impact" size="4" COLOR="red" style=" font-family:shuriken-std;">
                        <h2>REGISTRATE</h2>
                    </FONT>
                </div>

                <!--***********************UTILIZE ICONOS DE FONT-AWESOME**********************************-->

                <div class="card-body">
                    <form method="POST" class="frm1">
                        <!--ICONO USER-->
                        <div class="icons fondo">
                            <input class="form-control" type="text" name="txtNombre" placeholder="NOMBRE" required=""><br>
                            <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                        </div>
                        <!--ICONO DIRECTION-->
                        <div class="icons fondo">
                            <input class="form-control" type="text" name="txtDireccion" placeholder="DIRECCION" required=""><br>
                            <i class="fa fa-map fa-lg fa-fw"></i>
                        </div>
                        <!--ICONO PHONE-->
                        <div class="icons fondo">
                            <input class="form-control" type="number" name="txtTelefono" placeholder="TELEFONO" required=""><br>
                            <i class="fa fa-phone fa-lg fa-fw"></i>
                        </div>
                        <!--ICONO USER-->
                        <div class="icons fondo">
                            <input class="form-control" type="text" name="txtUsuario" placeholder="USUARIO" required=""><br>
                            <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                        </div>
                        <!--ICONO KEY-->
                        <div class="icons fondo">
                            <input class="form-control" type="password" name="txtClave" id="txtClave" placeholder="CLAVE" required=""><br>
                            <i class="fa fa-key fa-lg fa-fw"></i>
                        </div>
                        <!--ICONO KEY-->
                        <div class="icons fondo">
                            <input class="form-control" type="password" name="txtConClave" id="txtConClave" placeholder="CONFIRMAR CLAVE" required=""><br>
                            <i class="fa fa-key fa-lg fa-fw"></i>
                        </div>
                        <input class="btn btn-success" type="submit" name="REGISTRARSE" value="REGISTRARSE">
                        <input class="btn btn-info" type="button" value="LOGIN" onclick="window.location.href='../index.php';" />
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </CENTER>
</body>

</html>



<?php
include("conexion.php");
//LLAMANDO A LA FUNCION->CONEXION:
$conexion = conexion();
//*******************************BUSCAR USUARIO REPETIDO***********************
if (isset($_POST['REGISTRARSE'])) {
    $usuario = $_POST['txtUsuario'];

    $ver = buscarUsuRepetido($usuario);

    if ($ver > 0) {
        echo '<script>alertify.alert("EL NOMBRE DE USUARIO YA EXISTE PRUEBE CON OTRO");</script>';
        exit;
    }
}

//*******************************VERIFICA SI LA CLAVE ES CORRECTA***********************
if (isset($_POST['REGISTRARSE'])) {
    $clave1 = $_POST['txtClave'];
    $clave2 = $_POST['txtConClave'];

    if ($clave1 != $clave2) {
        echo '<script>alertify.alert("LA CONTRASEÑA NO COINCIDE...PORFAVOR INGRESE BIEN LA CONTRASEÑA");</script>';
        //uso exit cuando quiero interrumpir la ejecución del código PHP, PARA QUE ME PERMITA VALIDAR LA SIGUIENTE CONDICON Y NO PERMITIR QUE EJECUTE TODO A LA MISMA VEZ.
        //SIEMPRE EXIT VA AL FINAL DEL BLOQUE DE INTRUCCIONES NO FUERA
        exit;
    } else {
        $a = $_POST['txtNombre'];
        $b = $_POST['txtDireccion'];
        $c = $_POST['txtTelefono'];
        $d = $_POST['txtUsuario'];
        $e = $_POST['txtClave'];

        //LLAMANDO A LA FUNCION INSERTAR:
        //INSERTANDO LOS DATOS CON LOS PARAMETROS CREADOS EN LA CLASE: conexion.php
        $crear = insertarCliente($a, $b, $c, $d, $e);
        exit;
    }
    echo '<script>alertify.alert("TE REGISTRASTE SATISFACORIAMENTE AHORA PUEDES INICIAR SESION");</script>';
    exit;
}
