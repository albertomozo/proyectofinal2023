<?php include "inc_session.php"; ?>
<?php include "admin/inc_config.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
<?php
/* variables particulares de pagina */
$headTitle .= " ";
$headDescription .= "";
$headKeywords .=""; 
$menugrupo = 'estadisticas';
$menuenlace = 'est_peliculas';
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
                <h6 class="text-primary">Peliculas</h6>
                <h1 class="mb-4">Estadisticas</h1>
            </div>
            <div class="row g-4">
                 <!-- Bar Chart -->
                 <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                    <hr>
                                    Styling for the bar chart can be found in the
                                    <code>/js/demo/chart-bar-peliculas-demo.js</code> file.
                                </div>
                          </div>
                <?php
                $estado = 'A';
                include ("admin/inc_conexion_peliculas.php");
                echo $query = " select elemento_votado, AVG(valoracion) media from votaciones group by elemento_votado order by AVG(valoracion) DESC";
                        $resultado = mysqli_query($conpel,$query);
                        $legend = [];
                        $data = [];
                        if(mysqli_num_rows($resultado)!=0){   
                                while($fila=mysqli_fetch_array($resultado)){     
                                        echo $query2="select titulo from peliculas where id = " .  $fila["elemento_votado"];
                                        $resultado2 = mysqli_query($conpel,$query2);
                                        $titulo ='No encontrado';
                                        if(mysqli_num_rows($resultado2)!=0){ 
                                            $fila2 = mysqli_fetch_assoc($resultado2);
                                            $titulo = $fila2['titulo'];
                                        }  
                                        array_push($legend,$titulo);
                                        array_push($data,$fila["media"]);
                            } // FIN WHILE 
                                
                    }else{     
                                
                    }  
                    print_r($legend);
                    print_r($data);
                    $jlegend = json_encode($legend);
                    $jdata = json_encode($data);
                    $numValores = count($legend);

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
     <!-- Page level plugins -->
     <script src="./admin/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<!--    <script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script> -->
<script>
    // Obtencion de valores de los arrays $legen y $data de php */
    var legend,data;
    legend  = <?php echo $jlegend;?>;
    const legendt = Object.values(legend);
    data = <?php echo $jdata;?>; 
    const datat = Object.values(data);  
    console.log('LEGEND : ' + legend);
    console.log('LEGEND tipo : ' + typeof(legend));
    console.log('DATA : ' + data);
    console.log('LEGENDT : ' + legendt);
    console.log('LEGENDT tipo : ' + typeof(legendt));
</script>
    
<script src="./admin/js/demo/chart-bar-peliculas-demo.js"></script> 

</body>

</html>