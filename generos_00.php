<?php include "inc_session.php"; ?>
<?php include "admin/inc_config.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
<?php
/* variables particulares de pagina */
/* variables particulares de pagina */
$headTitle .= " Generos";
$headDescription .= "Muestro los generos de web";
$headKeywords .=""; 
$menugrupo = 'pelis';
$menuenlace = 'generos';
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


  


 

    <!-- Service Start -->
    <!-- Peliculas -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="text-primary">Generos</h6>
                <h1 class="mb-4">Nuestras recomendaciones</h1>
            </div>
            <div class="row g-4">
                <?php
                $estado = 'A';
                include ("admin/inc_conexion_peliculas.php");
                echo $query = "SELECT * FROM genero";
                $resultado = mysqli_query($conpel,$query);
                //print_r($resultado);
                if(mysqli_num_rows($resultado)!=0){ 
                                    
                    while($fila=mysqli_fetch_array($resultado)){  ?> 

                    
                

                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item rounded overflow-hidden">
                               
                                    <div class="service-icon">
                                        <i class="fa fa-solar-panel fa-3x"></i>
                                    </div>
                                    <h4 class="mb-3"><?php echo $fila['genero'];?></h4>
                                    
                                    <a class="small fw-medium" href="">Ver Mas<i class="fa fa-arrow-right ms-2"></i></a>
                                
                            </div>
                        </div>
                    <?php }
                } else {
                    echo '<p>No hay Generos</p>';
                }
                ?>


                     </div>
        </div>
    </div>
    <!-- Service End -->


   

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