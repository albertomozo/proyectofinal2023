<?php
include("inc_session.php");
include ("inc_conexion_peliculas.php");
$id = $_REQUEST['id']; 
$estado = $_REQUEST['estado']; // VIENEN DE 07-peliculas_genero_estado_02.PHP
$query = "update  peliculas set estado = '".$estado."'  where id = $id";
$resultado = mysqli_query($conpel,$query);
if ($resultado){
    header("location:peliculas.php");
} else {
    echo $query;
}
?>