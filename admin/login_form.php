<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (isset($_REQUEST['msg'])){ echo '<p>Error acceso</p>'; };?>
    <form name="loginform" method="POST" action="login_acceso.php">
        Usuario : <input type="text" name="usuario"> <br> 
        Password : <input type="password" name="password"> <br> 
        <input type="submit" name="enviar" value="ACCESO">
    </form>
</body>
</html>