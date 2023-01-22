<?php include "inc_session.php"; ?>
<?php include "admin/inc_config.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
<?php
/* variables particulares de pagina */
/* variables particulares de pagina */
$headTitle .= " Peliculas  Detalle";
$headDescription .= "Muestro la ";
$headKeywords .=""; 
$menugrupo = 'pelis';
$menuenlace = 'pelis';
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
    <?php
    //$estado = 'A';
    include ("admin/inc_conexion_peliculas.php");
    $id = $_GET['id']; // validar y sanitizar
    echo $query = "select * from peliculas where id = " . $_GET['id'];
    $resultado = mysqli_query($conpel,$query);
    if(mysqli_num_rows($resultado)!=0){ 
                                    
        while($fila=mysqli_fetch_array($resultado)){  
           $tmdb_id =  $fila['tmdb_id'];
           ?> 
    
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="text-primary" >Detalle Peliculas</h6>
                <h1 class="mb-4"><?php echo $fila['titulo'];?></h1>
            </div>
            <div class="row g-4">
                
               
                
                

                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item rounded overflow-hidden">
                                <h4>Datos BD</h4>
                                <img class="img-fluid" src="<?php echo $tmdb_ruta_poster . $fila["poster"] ?>" alt="">
                                <div class="position-relative p-4 pt-0">
                                    <div class="service-icon">
                                        <i class="fa fa-film fa-3x"></i>
                                    </div>
                                    <h4 class="mb-3"><?php echo $fila['titulo'];?></h4>
                                    <p><?php echo $fila['overview'];?></p>
                                    <p><?php echo $fila['estreno'];?></p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item rounded overflow-hidden">
                               
                                <div class="position-relative p-4 pt-0">
                                   
                                 
                                    <div id="pelicula_detalle"></div>
                                    <div id="pelicula_detalle_creditos"></div>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else {
                    echo '<p>No hay peliculas</p>';
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
    <!-- Mis scripts personalizados -->
    <script> 
        // incializacion de variables
        const tmdbId = '<?php echo $tmdb_id;?>'; 
        const apikey = '<?php echo $tmdb_apikey; ?>';
        const tmdb_ruta_poster = '<?php echo $tmdb_ruta_poster; ?>';
    </script>
    <script src="js/pelicula_detalle.js"></script>
    
   
</body>

</html>