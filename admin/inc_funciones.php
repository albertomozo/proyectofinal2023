<?php 
function limpiarVar($cadena){
    return trim(addslashes(htmlentities($cadena)));
}