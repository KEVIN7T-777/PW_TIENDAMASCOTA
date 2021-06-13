<?php
function conexion()
{

    $servidor = "localhost"; //DONDE ESTA LA BBDD?
    $usuario = "root"; //EL USUARIO POR DEFECTO DEL PHPMYADMIN
    $clave = "";
    $base = "tiendamascotasbdd"; //NOMBRE DE LA BASE DE DATOS

    //CONEXION A LA BASE DE DATOS SOLICITANDO TODOS LOS COMPONENTES ANTERIORES SI CUMPLE SE EJECUTA LA ACCION mysqli_connect
    $conectar = mysqli_connect($servidor, $usuario, $clave, $base) or die("ERROR EN LA CONEXION");
    return $conectar;
}

function buscarUsu($a, $b)
{
    $conect = conexion();
    $buscarCli = "SELECT cliUsuario, cliContraseña FROM clientes WHERE cliUsuario='$a' && cliContraseña='$b'";
    $unir = mysqli_query($conect, $buscarCli);
    //La función mysql_num_rows() de MySQL devuelve simplemente el número delíneas de un resultado. El inconveniente de esta función es que pesa muchopara el servidor, ya que se trata de un bucle que recorre cada línea paracontarla.
    $unirC = mysqli_num_rows($unir);
    return $unirC;
}

function buscarUsuRepetido($a)
{
    $conect = conexion();
    $buscarUsu = "SELECT * FROM clientes WHERE cliUsuario='$a' ";
    $unir = mysqli_query($conect, $buscarUsu);
    //La función mysql_num_rows() de MySQL devuelve simplemente el número delíneas de un resultado. El inconveniente de esta función es que pesa muchopara el servidor, ya que se trata de un bucle que recorre cada línea paracontarla.
    $unirBusqueda = mysqli_num_rows($unir);
    return $unirBusqueda;
}

function validarClave($a)
{
    $conect = conexion();
    $buscarUsu = "SELECT * FROM clientes WHERE cliUsuario='$a' ";
    $unir = mysqli_query($conect, $buscarUsu);
    //La función mysql_num_rows() de MySQL devuelve simplemente el número delíneas de un resultado. El inconveniente de esta función es que pesa muchopara el servidor, ya que se trata de un bucle que recorre cada línea paracontarla.
    $unirValidacion = mysqli_num_rows($unir);
    return $unirValidacion;
}

function insertarCliente($a, $b, $c, $d, $e)
{
    $conect = conexion();
    $Insertar = "INSERT INTO clientes VALUES (0,'$a','$b','$c','$d','$e')";
    $unirI = mysqli_query($conect, $Insertar);
    //La función mysql_num_rows() de MySQL devuelve simplemente el número delíneas de un resultado. El inconveniente de esta función es que pesa muchopara el servidor, ya que se trata de un bucle que recorre cada línea paracontarla.
    $unirInsert = ($unirI);
    return $unirInsert;
    exit;
}
