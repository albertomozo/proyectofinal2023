<?php
session_start();
include("inc_conexion_peliculas.php")
$usuario = $_REQUEST['usuario'];
$clave = $_REQUEST['password'];
$query = "SELECT * FROM usuarios WHERE "
if ($usuario == 'admin' and $clave == '1234'){
    // usuario admin
    $_SESSION['usuario']='administrador';
    //echo 'entro';
    mysqli_close($conpel);
    header("location:peliculas.php");
} else {
    //echo 'NO ENTRO';
    mysqli_close($conpel);
    header("location:login.html?msg=1");
}