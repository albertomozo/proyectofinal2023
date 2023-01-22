<?php
session_start();
$usuario = $_REQUEST['usuario'];
$clave = $_REQUEST['password'];
if ($usuario == 'admin' and $clave == '1234'){
    // usuario admin
    $_SESSION['usuario']='administrador';
    //echo 'entro';
    header("location:peliculas.php");
} else {
    //echo 'NO ENTRO';
    header("location:login.html?msg=1");
}