<?php include("inc_session.php");
include("inc_config.php");                
if (isset($_REQUEST['id'])){
    include ("inc_conexion_peliculas.php");
    $id = $_REQUEST['id'];
    $query = "DELETE FROM peliculas WHERE id=$id";
    $resultado = mysqli_query($conpel,$query);
    if ($resultado)
    {
        $iden = $id+1;
        header("location:peliculas.php#pel_$iden");
        exit;
        echo '<p>Pelicula borrada</>';
    } else {
        echo "<p> $query</p>"; 
    }
    mysqli_close($conpel);
} else {
    echo '<p>No hay peli que borrar</p>';
}
 

