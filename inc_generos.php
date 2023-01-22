<?php
// requiere que exista $conpel 
// genera el array generosT
$query = "select * from genero";
$resultado = mysqli_query($conpel,$query);
$generosT = []; // inicializo generossT como array;
while ($fila=mysqli_fetch_assoc($resultado)){
    $generosT[$fila['id']]= $fila['genero']; // añado elemento al array
}
/*
$generoT[12]= 'Aventura';
$generoT[14]= 'Fantasia';
....


*/
?>