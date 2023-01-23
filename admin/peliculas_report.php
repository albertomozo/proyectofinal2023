<?php
$titulo = $_REQUEST['titulo'];
header("Content-type: application/vnd.ms-excel; charset=UTF-8");
$fichero = 'peliculas_'.date("YmdHis").'.xls';
header("Content-Disposition: attachment; filename=$fichero");

include ("inc_conexion_peliculas.php");
 $query = "select * from peliculas";
$resultado = mysqli_query($conpel,$query);
if(mysqli_num_rows($resultado)!=0){ ?>   
    <h2><?php echo "Nº resultados:" .mysqli_num_rows($resultado) ?></h2>    
    <?php 
    echo '<table>';
    echo '<tr><td>' . $fichero . '</td></tr>';
    echo '<tr><td>' . $titulo . '</td></tr>';
    ?>
    <tr><th>Id</th><th>tmdbId</th><th>Titulo </th><th>estreno</th><th>poster</th></tr>
    <?php
    while($fila=mysqli_fetch_array($resultado)){  ?>   
        <tr>       
                <td ><?php echo $fila["id"] ?> </td>
                 <td><?php echo $fila["tmdb_id"] ?></td>
                 <td><?php echo $fila["titulo"] ?></td>
                 <td><?php echo $fila["estreno"] ?></td>
                 <td>
                    <img src="<?php echo $tmdb_ruta_poster . $fila["poster"] ?>" />
                    
                    
                 
                 </td>
                 
                
               
    </tr>
    <?php } // FIN WHILE ?> 
    </table>      
<?php  }else{ ?>     
          <article>
                <p class='precio'>Lo siento,  no hay registros</p>
            </article>    
<?php } ?>     
<?php  mysqli_close($conpel); ?>