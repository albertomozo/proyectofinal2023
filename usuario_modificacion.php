<?php include "inc_session.php"; ?>
<?php include "admin/inc_config.php"; ?>
<?php include "admin/inc_funciones.php";?>
<!DOCTYPE html>
<html lang="es">

<head>
<?php
/* variables particulares de pagina */
$headTitle .= " ";
$headDescription .= "";
$headKeywords .=""; 
$menugrupo = '';
$menuenlace = '';
include("inc_head.php");
?>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <?php include("inc_topbar.php");?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php include ("inc_navbar.php"); ?>
    <!-- Navbar End -->
     <?php
     include("admin/inc_conexion_peliculas.php");

     if (isset($_POST['nombre'])){
        foreach ($_REQUEST as $key => $valor)
        {
            //echo "<P>$key => $valor </p>";
            $$key=limpiarVar($valor); // genera variables con nombre $key y el contenido $valor
            
        }
        // validar datos
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        //
        echo $ahora = time();
        echo $query = "UPDATE  usuarios SET nombre= '$nombre',apellidos='$apellidos',mail = '$mail',telefono= '$telefono',modificado=$ahora WHERE id = $id";
           
        $resultado = mysqli_query($conpel,$query);
        if ($resultado){
     
        } else {
            echo '<p>Fallo en la Modificion</p>';
        }
            
            
    }    else {
        // entramos por get (mostrar el formulario)
        $id = $_REQUEST['id'];
        echo $query = "SELECT * FROM usuarios WHERE id = $id ";
        $resultado = mysqli_query($conpel,$query);
         if (mysqli_num_rows($resultado)>0) // ya haya un usuario con ese valor
        {
            $fila = mysqli_fetch_array($resultado);
            foreach ($fila as $key => $valor){
                $$key = $valor;
            }
        ?>
    <!-- Modificacion Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0" >
        <div class="container contact px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <h6 class="text-primary">Modificacion</h6>
                        <h1 class="mb-4">Cambia tu datos</h1>
                        <!-- <p class="mb-4">Hacer, comentarios, valorar las peliculas y mucho más .... </p> -->
                        <form action="" method="POST">
                        
                                
                            <div class="row g-3">
                                <!-- No voy a dejar modificar usuario ni pasword -->
                                <!-- <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="usuario" name="usuario"  placeholder="Usuario para acceder">
                                        <label for="usuario">usuario</label>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password" name="password"  placeholder="contraseña">
                                        <label for="password">Contraseña</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password2" name="password2"  placeholder="Repite contraseña">
                                        <label for="password2">Repite Contraseña</label>
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" value="<?php echo $nombre;?>">
                                        <label for="name">Tu Nombre</label>
                                    </div>
                                </div>
                                
                                 <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="apellidos" name="apellidos"  placeholder="apellidos"  value="<?php echo $apellidos;?>">
                                        <label for="apellidos">Apellidos</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="mail" name="mail" placeholder="tu Email"  value="<?php echo $mail;?>">
                                        <label for="mail">TU  Email</label>
                                    </div>
                                </div>
                                
                              
                               
                                
                                
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="telefono" name="telefono"  placeholder="telefono"  value="<?php echo $telefono;?>">
                                        <label for="telefono">telefono</label>
                                    </div>
                                </div>

                                <input type="hidden" name="id"  value="<?php echo $id;?>" >
                               
                               
                                <div class="col-12">
                                    <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Actualiza tus Datos</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <!-- <div class="position-relative h-100">
                        <iframe class="position-absolute w-100 h-100" style="object-fit: cover;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    <?php } else { echo "<p>Error id $id</p>";}
     } 
     mysqli_close($conpel);
    ?>





  


    
    



    <!-- Footer Start -->
    <?php include ("inc_footer.php");?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>