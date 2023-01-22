<?php
$servidor="sql305.epizy.com";
$bduser="epiz_30918323";
$bdclave="MI6hODcUFSm";
$bdnombre="epiz_30918323_peliculas";
$conpel=mysqli_connect($servidor,$bduser,$bdclave,$bdnombre);
if ($conpel){
    mysqli_set_charset($conpel,"utf8");
}
$tmdb_apikey='98fee347b91da83932ea8b9daa0edece';
$tmdb_ruta_poster = 'https://image.tmdb.org/t/p/w154'; // 
$tmdb_ruta_poster_500 = 'https://image.tmdb.org/t/p/w500';
?>