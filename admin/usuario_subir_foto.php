<?php include('inc_session.php'); 
include('inc_config.php');
echo 'hola';
echo $dir_subida = $_SERVER['DOCUMENT_ROOT'] . $sitioRutaLocal . $rutaImagenesPerfil ; // var definidas en inc_config.php
$id = $_POST['id'];
if ($_FILES['imagen']['type'] =='image/gif'){
//foreach ($_POST as $key => $valor) { echo "$key : $valor"; }
    $fichero_subido = $dir_subida . 'perf_'.$id.'.gif';
   
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {
        $msg='Ok';
    } else {
       $msg = 'error subida';
    }

} else {
    $msg = 'no es de tipo gif';
}
header("location:usuarios_editar.php?id=$id&msg=$msg");
?>