<?php
$servidor="*****";
$bduser="******";
$bdclave="******";
$bdnombre="*********";
$conpel=mysqli_connect($servidor,$bduser,$bdclave,$bdnombre);
if ($conpel){
    mysqli_set_charset($conpel,"utf8");
}
$tmdb_apikey='********************';
$tmdb_ruta_poster = 'https://image.tmdb.org/t/p/w154'; // 
$tmdb_ruta_poster_500 = 'https://image.tmdb.org/t/p/w500';
?>
