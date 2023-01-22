<?php
$filename  = "log/log-". $_SESSION['usuarioid']."-".date("Ymd")."txt";
$file = fopen($filename,"a");
$linea = date("Y/m/d H:i:s") . ';' . $_SERVER['PHP_SELF'] . ';' .  $_SERVER['HTTP_USER_AGENT'] .";".$_SESSION['usuarioid']. ";". time() . "\r\n";
fwrite($file,$linea);
fclose($file);
?>