<?php
  //Abrir conexion a la base de datos
  function connect($db)
  {
    $servidor = 'localhost';
    $bduser='root';
    $bdclave='';
    $bdnombre= 'peliculas';
    $conpel=mysqli_connect($servidor,$bduser,$bdclave,$bdnombre);
    if ($conpel){
        mysqli_set_charset($conpel,"utf8");
    }
    $tmdb_apikey='98fee347b91da83932ea8b9daa0edece'; // registrarse en themoviedb.org y obtener tu apikey
    $tmdb_ruta_poster = 'https://image.tmdb.org/t/p/w154'; 
  }
 //Obtener parametros para updates
 function getParams($input)
 {
    $filterParams = [];
    foreach($input as $param => $value)
    {
            $filterParams[] = "$param=:$param";
    }
    return implode(", ", $filterParams);
	}
  //Asociar todos los parametros a un sql
	function bindAllValues($statement, $params)
  {
		foreach($params as $param => $value)
    {
				$statement->bindValue(':'.$param, $value);
		}
		return $statement;
   }
 ?>