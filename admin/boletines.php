<?php 
/*lista blanca */
$boletines = ['estrenos', 'noticias', 'promociones' , 'preventas'];

$boletinP = ['estrenos','noticias','das', 'dhasjdhsajk'];
$correcto = 'S';
foreach ($boletinP as $valor){
    if (!in_array($valor,$boletines)){
        echo "invalido $valor |";
        $correcto = 'N';
    } 
}
if ($correcto == 'S'){
    echo '<h3>Correcto</h3>';
} else {
    echo '<h3>Incorrecto</h3>';
}

/*lista negra */
$boletines = ['madrid', 'ajax'];

$boletinP = ['barca','das', 'dhasjdhsajk'];
$correcto = 'S';
foreach ($boletinP as $valor){
    if (in_array($valor,$boletines)){
        echo "invalido $valor |";
        $correcto = 'N';
    } 
}
if ($correcto == 'S'){
    echo '<h3>Correcto</h3>';
} else {
    echo '<h3>Incorrecto</h3>';
}