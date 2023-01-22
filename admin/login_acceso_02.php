<?php
session_start();
$usuario = $_REQUEST['usuario'];
$clave = $_REQUEST['password'];
include("inc_conexion_peliculas.php");
/* $query = "SELECT  * FROM  usuarios 
WHERE usuario = '$usuario' AND  password='$clave'"; */
$query = "SELECT  * FROM  usuarios 
WHERE (usuario = '$usuario' AND  password='$clave') AND estado='A'";
$resultado = mysqli_query($conpel,$query);
if (mysqli_num_rows($resultado)== 1) {
    $fila = mysqli_fetch_array($resultado);
    $_SESSION['rol']  = $fila['rol'];
    $rol = $fila['rol'];
    $_SESSION['usuario'] = $usuario = $fila['usuario'];
    $_SESSION['usuarioid']  = $fila['id'];
    mysqli_close($conpel);

    // una unica pagina de inicio
    header("location:peliculas.php");
    exit;
    // podemos personalizar la pagina de inicio por roles
   /*  switch ($rol) {
        case 'A':
            header("location:peliculas.php");
            break;
        case 'I':
            header("location:peliculas.php");
            break;
        case 'U':
            header("location:peliculas.php");
            break;
        case 'E':
            header("location:peliculas.php");
            break;      
        default:
            header("location:peliculas.php");
            break;        
    }
    exit; */
} else {
    // error de acceso
    header("location:login.php?msg=1");
    exit;
}



