<?php include("inc_session.php"); ?>
<?php include("inc_config.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
     $headTitle .= " busqueda peliculas";
     $headDescription .= "";
     $headKeywords .="";
     $menugrupo = 'pelis'; 
     $menuenlace = 'peliculas_buscar';
    include("inc_head.php");
    ?>
    <STYLE>
   /*      li .activeA {
            color : red;
    } */
    </STYLE>
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
                        <h1 class="h3 mb-0 text-gray-800">Buscar Peliculas</h1>
                   
                    </div>
                    <?php include ("inc_conexion_peliculas.php");
                    $search = urlencode( $_REQUEST['search']);
                if ($search !=''){
                    $pagina = 1;
                    if (isset($_REQUEST['pagina'])){
                        $pagina = $_REQUEST['pagina'];
                    }
                    $url = "https://api.themoviedb.org/3/search/movie?api_key=$tmdb_apikey&language=es&query=$search&page=1&include_adult=false&page=$pagina";
                    $resultado = file_get_contents($url);
                    $items = json_decode($resultado, true);
                    echo "<p>Termino de busqueda : $search</p>";
                    $page = $items['page'];
                    $pelis = $items['results']; // lista de peliculas
                    $total_pages = $items['total_pages'];
                    $total_results = $items['total_results'];
                    if ($total_results>0){
                        // calculo de pagina 
                        $limiteI = ($page-1)*20 +1;
                        $limiteS = $page * 20;
                        if ($limiteS>$total_results) {$limiteS = $total_results;}
                        echo "<p><strong>Pagina : $page </strong> Mostrando resultados $limiteI a $limiteS </p> ";
                        // paginacion 
                        for ($i=1;$i<=$total_pages;$i++){
                            $activo = '';

                            if ($pagina == $i ) { $activo = 'activeA'; }
                            echo '<li>' ;
                                 echo "<a href='peliculas_buscar.php?search=$search&pagina=$i' class='$activo'>Pagina $i</a>";
                            echo '</li>';
                          }
                    
                    ?>
                        

                        <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Estreno</th>
                                                <th>titulo original</th>
                                                <th>titulo</th>
                                                <th>grabar</th>
                                                <th>Cartel</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                                <th>Id</th>
                                                <th>Estreno</th>
                                                <th>titulo original</th>
                                                <th>titulo </th>
                                                <th>grabar</th>
                                                <th>Cartel</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        




                            

                        <?php
                    
                        foreach ($pelis as $valor){
                            $tmdbid = $valor['id'];
                            echo '<tr>';
                        echo '<td>' . $valor['id'] . '</td><td>' . $valor['release_date'] . '</td><td>' .$valor['original_title'].'</td><td>' . $valor['title']  .'</td><td><a href="peliculas_nueva.php?id='.$tmdbid.'">grabar</a></td><td>' ;
                        echo '<img src="'.$tmdb_ruta_poster.$valor['poster_path'].'" width="40px">';
                        echo '</td>';
                        echo '</tr>';
                        }
                        echo '</tbody>
                        </table>';
                    } else {
                        var_dump($items);
                        echo '<p>No hay resultados para esa busqueda</p>';
                    }

                  } else {
                    echo '<p>Busqueda de elemento vacio</p>';
                  }
                   mysqli_close($conpel);?>


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