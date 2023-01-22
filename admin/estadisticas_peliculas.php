<?php include("inc_session.php"); ?>
<?php include("inc_config.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
     $headTitle .= " - estadisticas peliculas";
     $headDescription .= "";
     $headKeywords .=""; 
     $menugrupo  = 'estadisticas'; // para mostrar (show) grupo de menu
     $menuenlace = 'est_peliculas'; // para activar (active)  enlace en menu
    include("inc_head.php");
    ?>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include("inc_sidebar.php");?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("inc_topbar.php");?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Estadísticas Peliculas</h1>
                       
                    </div>

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

                    <!-- Content Row -->
                   

                    <!-- Content Row -->

                  
                    <!-- Content Row -->
                 

                </div>
                <!-- /.container-fluid -->
                <?php
                /* obtener mejores peliculas */
                        include("./inc_conexion_peliculas.php");
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
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("inc_footer.php");?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
   <?php include("inc_modal_logout.php"); ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

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
        
  <script src="js/demo/chart-bar-peliculas-demo.js"></script> 

</body>

</html>