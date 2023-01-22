<?php include("inc_session.php"); ?>
<?php include("inc_config.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
     $headTitle .= "";
     $headDescription .= "";
     $headKeywords .=""; 
     $menugrupo  = ''; // para mostrar (show) grupo de menu
     $menuenlace = ''; // para activar (active)  enlace en menu
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
                        <h1 class="h3 mb-0 text-gray-800">Tablero de control</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <?php
                    include ("inc_conexion_peliculas.php");
                  /*   $search = '';
                    if (isset($_REQUEST['search'])){
                    $search = urlencode( $_REQUEST['search']);
                    } */
                    $search = urlencode( $_REQUEST['search']);

                    echo $url = "https://api.themoviedb.org/3/search/movie?api_key=$tmdb_apikey&language=es&query=$search&page=1&include_adult=false";
                    $resultado = file_get_contents($url);
                    $items = json_decode($resultado, true);
                    //print_r($items);
                    echo $url;
                    echo '<hr>';
                    echo "paginas " . $items['page'];
                    $pelis = $items['results']; // lista de peliculas
                    foreach ($pelis as $valor){
                        $tmdbid = $valor['id'];
                       echo '<p>' . $valor['id'] . '-' . $valor['release_date'] . '-' .$valor['original_title']. '***' .$valor['title'].' <a href="09-peliculas_nueva_grabar_04.php?id='.$tmdbid.'">grabar</a>' ;
                       echo '<img src="'.$tmdb_ruta_poster.$valor['poster_path'].'" width="100px">';
                       echo '</p>';
                    }
                    mysqli_close($conpel);

                    ?>
                    <!-- Content Row -->
                   

                    <!-- Content Row -->

                  
                    <!-- Content Row -->
                 

                </div>
                <!-- /.container-fluid -->

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
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>