<?php
include("admin/inc_conexion_peliculas.php");
require_once("clases/Usuarios.php");
$persona = new Usuarios;
//echo '<p>$persona->nombre' .  $persona->nombre .'</p>';
echo '<p>$persona->getFichaUsuario' .  $persona->getFichaUsuario(1) .'</p>';

?>