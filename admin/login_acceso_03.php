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
$urllogin='login.php';
// si existe  'origen' vengo de la pagina publica
if (isset($_REQUEST['origen'])){
    if ($_REQUEST['origen']=='web') {
        $urllogin = '../login.php';
    } 
}
if (mysqli_num_rows($resultado)== 1) {
    $fila = mysqli_fetch_array($resultado);
    $_SESSION['rol']  = $fila['rol'];
    $rol = $fila['rol'];
    $_SESSION['usuario'] = $usuario = $fila['usuario'];
    $_SESSION['usuarioid']  = $fila['id'];
    $_SESSION['telefono']  = $fila['telefono'];
    $_SESSION['nombre']  = $fila['nombre'];
    
   
    mysqli_close($conpel);
    include("inc_logaccesos.php");
    // una unica pagina de inicio
    //header("location:peliculas.php");
    //exit;
    // podemos personalizar la pagina de inicio por roles
    switch ($rol) {
        case 'A':
            header("location:peliculas.php");
            break;
        case 'I':
             header("location:../index.php");
            break;
 
        case 'U':
            header("location:../index.php");
            break;
        case 'E':
            header("location:peliculas.php");
            break;      
        default:
            header("location:$urllogin?msg=4");
            break;        
    }
    exit; 
} else {
    // error de acceso
    //header("location:login.php?msg=1");
    header("location:$urllogin?msg=1");
    exit;
}



