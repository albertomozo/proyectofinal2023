<?php include "inc_session.php"; ?>
<?php include "admin/inc_config.php"; ?>
<?php include "admin/inc_funciones.php";?>
<!DOCTYPE html>
<html lang="es">

<head>
<?php
/* variables particulares de pagina */
$headTitle .= " Activación Usuarios";
$headDescription .= "Activación de los usuarios registrados en el sistema";
$headKeywords .=""; 
$menugrupo = 'usuarios';
$menuenlace = 'activar';
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
     $id = 0;
     if (isset($_REQUEST['id'])){ 
        $id = $_REQUEST['id'];
     }
     $token  = '';
     if (isset($_REQUEST['token'])){ 
        $token = $_REQUEST['token'];
     }
             
        // BUSCAR id y token 
        include("admin/inc_conexion_peliculas.php");
        echo $query = "SELECT * FROM usuarios WHERE id = $id and token = '$token' ";
        $resultado = mysqli_query($conpel,$query);
        if (mysqli_num_rows($resultado)==0) // No  hay usuario con ese valor
        {
            echo '<p>Error id y/o token/p>';
        } else {
            // comprobar fec
            // modificar valor estado 
            echo $query = "UPDATE  usuarios SET estado= 'A' where id = $id";
            $resultado = mysqli_query($conpel,$query);
            if ($resultado){
                echo '<p>Ya puedes acceder a tu cuenta</p>'; 
                ?>
                <div class="col-12">
                <a href="login.php" class="btn btn-primary rounded-pill py-3 px-5" >Accede</a>
            </div> <?php                 
            } else {
                   echo '<p>Fallo en la Modificacion</p>';
            }
                 
            

        // 
        

        mysqli_close($conpel); 
     } ?>





  


    
    



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