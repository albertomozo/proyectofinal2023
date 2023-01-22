<?php
include ("inc_conexion_peliculas.php");
$query = "SELECT * FROM genero";
$resultado = mysqli_query($conpel,$query);
//print_r($resultado);

if(mysqli_num_rows($resultado)!=0){ 
    echo '<h3>Conjunto DE checkbox</h3>';
    while($fila=mysqli_fetch_array($resultado)){  
        echo '<label for="'.$fila['id'].'" >'. $fila['genero'] . '</label>';
        echo '<input type="checkbox" name="generos[]" value="'.$fila['id'].'" id="'.$fila['id'].'">';
    }
} 

$resultado = mysqli_query($conpel,$query);
if(mysqli_num_rows($resultado)!=0){ 
   
    echo '<h3>Lista desplegable</h3>';
    echo '<select name="generos" multiple>';
    while($fila=mysqli_fetch_array($resultado)){    
            echo '<option value="'.$fila['id'].'">'.$fila['genero'].'</option>';
    } 
    echo '</select>';
} 
 
mysqli_close($conpel);
?> 