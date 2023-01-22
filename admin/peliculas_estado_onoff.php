<?php
include("inc_session.php");
include ("inc_conexion_peliculas.php");
$id = $_REQUEST['id']; 
$estado = $_REQUEST['estado']; 
$query = "update  peliculas set estado = '".$estado."'  where id = $id";
$resultado = mysqli_query($conpel,$query);
if ($resultado){
   echo "$estado|$id";
} else {
    echo 'error';
}
?>