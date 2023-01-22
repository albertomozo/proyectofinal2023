<?php
include "config.php";
/*
  listar todos los usuarios o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id']))
    {
      $query = "select * from usuarios where id = ". $_GET['id'];
      header("HTTP/1.1 200 OK");
      $resultado = (mysqli_query($conpel,$query));
      echo 'usuario ';
      echo json_encode( $resultado) ;
  
      exit();
	  }
    else {
        if (isset($_SERVER['PATH_INFO'])){

            $id = substr($_SERVER['PATH_INFO'],1);
            $query = "select * from usuarios where id = $id";
            header("HTTP/1.1 200 OK");
            $resultado = (mysqli_query($conpel,$query));
            $fila = mysqli_fetch_assoc($resultado);
            
            $textofinal =  json_encode( $fila) ;
            //
            $query = "select votaciones.* , peliculas.titulo from votaciones, peliculas where usuarioid = $id and votaciones.elemento_votado = peliculas.id";
            $resultado = (mysqli_query($conpel,$query));
            $votaciones = [];
            while ($fila = mysqli_fetch_assoc($resultado))
            {
                array_push($votaciones,$fila);
            }
            $textofinal .= ',"votaciones" :  '. json_encode($votaciones) . "";
            echo $textofinal;
            exit;

        } else {
            $query = "select * from usuarios";
            header("HTTP/1.1 200 OK");
            $resultado = (mysqli_query($conpel,$query));
            $usuarios = [];
            while ($fila = mysqli_fetch_assoc($resultado))
            {
                array_push  ($usuarios,$fila);
            }
            echo json_encode( $usuarios) ;
            exit;

        }



 /*      //Mostrar lista de post
      $sql = $dbConn->prepare("SELECT * FROM users");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      echo json_encode( $sql->fetchAll()  );
      exit(); */
	}
}
// Crear un nuevo post
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $input = $_POST;
    print_r($input);
/*     $title = $_POST[title];
    $estatus = $_POST['estatus'];
    $content = $_POST['content'];
    $user_id = $_POST['user_id']; */
   

    $sql = "INSERT INTO users
          (nombre, apellidos, mail, telefono, user_rol)
          VALUES
          (:nombre, :apellidos, :mail, :telefono, :user_rol)";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();
    if($postId)
    {
      $input['id'] = $postId;
      header("HTTP/1.1 200 OK");
      echo json_encode($input);
      exit();
	 }
}
//Borrar
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
	$id = $_GET['id'];
  $statement = $dbConn->prepare("DELETE FROM users where id=:id");
  $statement->bindValue(':id', $id);
  $statement->execute();
	header("HTTP/1.1 200 OK");
	exit();
}
//Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
   parse_str(file_get_contents("php://input"),$put_vars);
   $postId = $_GET['id'];
   $fields = getParams($put_vars);
       $sql = "
          UPDATE users
          SET $fields
          WHERE id='$postId'
           ";
          
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $put_vars);
    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}
//En caso de que ninguna de las opciones anteriores se haya ejecutado
echo 'Hay una oopcion no definida';
foreach ($_SERVER as $key => $valor)
{
    echo "<p>$key : $valor</p>";
}

//header("HTTP/1.1 400 Bad Request");
?>