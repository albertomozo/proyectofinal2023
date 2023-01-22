<?php
$servidor="localhost";
$bduser="root";
$bdclave="";
$bdnombre="peliculas";
$conpel=mysqli_connect($servidor,$bduser,$bdclave,$bdnombre);
if ($conpel){
    mysqli_set_charset($conpel,"utf8");
}
$tmdb_apikey='98fee347b91da83932ea8b9daa0edece'; // registrarse en themoviedb.org y obtener tu apikey
$tmdb_ruta_poster = 'https://image.tmdb.org/t/p/w154'; // 
$tmdb_ruta_poster_500 = 'https://image.tmdb.org/t/p/w500';
?>