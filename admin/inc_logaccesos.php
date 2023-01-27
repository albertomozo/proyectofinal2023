<?php
$vusuario = 'noid';
if (isset($_SESSION['usuarioid'])) { $vusuario=$_SESSION['usuarioid'];}
$filename  = "log/log-". $vusuario."-".date("Ymd").".txt";
$file = fopen($filename,"a");
$linea = date("Y/m/d H:i:s") . ';' . $_SERVER['PHP_SELF'] . ';' .  $_SERVER['HTTP_USER_AGENT'] .";".$vusuario. ";". time() . ";". $logaccion ."\r\n";
fwrite($file,$linea);
fclose($file);
?>