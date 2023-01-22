<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilos.css" rel="stylesheet" type="text/css">
    <title>API PRUEBA</title>
</head>
<body>
    <H1>API PRUEBA</H1>
     <h2>Instrucciones de manejo</h2>
    <p>Copiar todos los archivos de este directorio a vuestro servidor, Importar las Bases de datos mediante <a href="mibase.sql">mibase.sql</a> y adapatar el sistema a vuestras necesidades</p>
    <H2>Manejo de POST</H2>
    <H3><span class="get">GET</span>GET post</h3>
    <p> 
    <a href="http://localhost/php/05-API/api-php/post">http://localhost/php/05-API/api-php/post</a> <br>
    Obtiene la lista de todos los POST
</p>
    <p> 
    http://localhost/php/05-API/api-php/post/{ID} <br>
    Obtiene la entrada que tiene el id indicado
    <p>
    <H3> POST post</h3>
    <p>
        <ul>Valores a enviar por POST
            <li>title : char de 100 caracteres</li> 
            <li>estatus: enum('draft', 'published')</li>
            <li>content : text </li>
            <li>user_id : integer </li>
        </ul>
    </p>
    <H3> PUT post</h3>
    <p>
        <ul>Valores a enviar por PUT
            <li>id : integer identificador del POST</li> 
        </ul>
    </p>
    <H3> DELETE post</h3>
    <p>
        <ul>Valores a enviar por DELETE
            <li>id : integer identificador del POST</li> 
           
        </ul>
    </p>
   
    <h2>EJEMPLOS</H2>
    <h3>Importar Post datos de un wordpress</h3>
    <a href="importar_wordpress.php">importar_wordpress.php</a>
    <p>Mediante la API de wordpress leemos los posts de un wordpress, y los apasmos por curl a nuestra tabla POSTS mediante CURL</P>
    <h3>Enviar datos de un formulario a POST </h3>
    <a href="importar_post_formulario.php">importar_post_formulario.php</a>
    <p>Rellenamos un formulario y los datos los enviamos por CURL a nuestra API</P>
    
</body>
</html>