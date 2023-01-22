<?php
include("admin/inc_conexion_peliculas");
$query = "select * from peliculas";
$resultado = mysqli_query($conpel,$query);
while ($fila = mysqli_fetch_array($resultado)){
    
    INSERT INTO `peliculas` (`id`, `tmdb_id`, `titulo`, `poster`, `estado`, `estreno`, `overview`, `opinion`) VALUES
(1, '550', 'El Club de la Lucha', '1yWmCAIGSVNuTOGyz9F48W9g1Ux.jpg', 'D', '1999-10-15', '', ''),
}

