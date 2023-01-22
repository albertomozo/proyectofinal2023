<?php include("inc_session.php"); ?>
<?php include("inc_config.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
     $titulo = 'Nueva Pelicula';
     $headTitle .= "";
     $headDescription .= "";
     $headKeywords .=""; 
     $menugrupo  = 'Peliculas'; // para mostrar (show) grupo de menu
     $menuenlace = 'peliculas_buscar'; // para activar (active)  enlace en menu
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
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $titulo;?></h1>
                    </div>
                    <?php 
                    if (isset($_REQUEST['id']))
                    {
                        include("inc_conexion_peliculas.php");
                        $tmdbId = $_REQUEST['id'] ;
                        $url = "https://api.themoviedb.org/3/movie/$tmdbId?api_key=98fee347b91da83932ea8b9daa0edece&language=es";
                        $resultado = file_get_contents($url);
                        $items = json_decode($resultado, true);
                        // comprobar si ya existe la pelicula en nuestra
                        $tmdb_id = $items['id'];
                        $query = "SELECT * FROM peliculas WHERE tmdb_id = '$tmdb_id'";
                        $resultado = mysqli_query($conpel,$query);
                        if (mysqli_num_rows($resultado)==0)
                        { 
                            // generar registro en peliculas
                            $query = "INSERT INTO peliculas (tmdb_id,titulo,poster,estado,estreno,overview) values ('". $items['id'] . "','". $items['title'] ."','". $items['poster_path'] ."','D','". $items['release_date']."','".addslashes($items['overview'])."')";
                            echo $query;
                            $resultado = mysqli_query($conpel,$query);
                            if ($resultado)
                            {
                                echo 'Ok';
                                $lastid = mysqli_insert_id($conpel); // id del ultimo registro insertado
                                // GRABAMOS EN LOS GENEROS EN LA TABLA peli_genero
                                echo '<hr>';
                                $generos = $items['genres'];
                                foreach ($generos as $key => $valor) {
                                    echo '<p>'. $valor['id'] .' = ' . $valor['name'] . '</p>';
                                    $queryi= "INSERT INTO peli_genero (peliculaid,generoid) VALUES ($lastid,".$valor['id'] .")";
                                    $resultado1 = mysqli_query($conpel,$queryi);
                                    if ($resultado1) {

                                    }else {
                                        echo "<p>$queryi</p>";
                                    }
                                    
                                }


                            }else{
                                echo '<p>Error de Inserción</p>';
                                echo '$query';
                            }
                        } else {
                            $fila = mysqli_fetch_array($resultado);
                            echo '<p>Upss lo siento, ya tenemos ese registro de themoviedb.org </p>';
                            echo '<p><a href="peliculas_ver.php?id='.$fila['id']. '">codigo tmdb : '.$tmdbId .'</a>';
                        }
                        mysqli_close($conpel);




                    
                    } else {
                        echo '<p> No hay pelicula seleccionada</p>';
                    }?>

                    
                 

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