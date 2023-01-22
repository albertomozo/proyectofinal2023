<?php include("inc_session.php"); ?>
<?php include("inc_config.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
     $headTitle .= "editar";
     $headDescription .= "edicion de peliculas";
     $headKeywords .=""; 
     $menugrupo  = 'pelis'; // para mostrar (show) grupo de menu
     $menuenlace = 'peliculas_editar'; // para activar (active)  enlace en menu
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
                <?php include("inc_topbar.php");
                  include("inc_conexion_peliculas.php");
                  if ($_POST){
                        $id = $_POST['id'];
                        $titulo = mysqli_real_escape_string($conpel,$_POST['titulo']);
                        $overview = mysqli_real_escape_string($conpel,$_POST['overview']);
                        $opinion = mysqli_real_escape_string($conpel,$_POST['opinion']);
                        //$poster = $_POST['poster'];
                        echo $query = "UPDATE peliculas SET titulo = '$titulo' , overview = '$overview' , opinion = '$opinion' WHERE id = $id";
                        $resultado = mysqli_query($conpel,$query);
                        if ($resultado)
                        {
                            echo '<p>Modificación correcta</p>';
                        } else {
                            echo '<p>Error modificación</p>';
                        }

                  } else {

                        $id = $_GET['id']; 
                    }
                        echo  $query = "select * from peliculas where id = $id";
                        $resultado = mysqli_query($conpel,$query);
                        //print_r($resultado);
                        if(mysqli_num_rows($resultado)!=0){
                            $fila = mysqli_fetch_assoc($resultado);
                            $titulo = $fila['titulo'];
                            $overview = $fila['overview'];
                            $opinion = $fila['opinion'];
                            $poster = $fila['poster'];

                        }
                
                ?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Peliculas - Editar</h1>
                    </div>
                    <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block "><img src="<?php echo  $tmdb_ruta_poster . $fila["poster"] ?>"  />  </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Editar Pelicula</h1>
                            </div>
                            <form class="user" method="POST" action="" >
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="hidden" name="id" value="<?php echo $id;?>">
                                        <p>Titulo</p>
                                        <input type="text" class="form-control form-control-user" id="titulo" name="titulo"
                                            placeholder="Titulo" value="<?php echo $titulo;?>">
                                    </div>
                               <!--      <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div> -->
                                </div>
                                <div class="form-group">
                                    <p>Opinión</p>
                                    <textarea  class="form-control form-control-user" id="exampleInputEmail" name="opinion" 
                                    placeholder="Opinión">
                                    <?php echo $opinion; ?>
                                    </textarea>
                                    <p>Overview</p>
                                    <textarea  class="form-control form-control-user" id="exampleInputEmail" name="overview" 
                                    placeholder="overview">
                                    <?php echo $overview; ?>
                                    </textarea>
                                </div>
                               
                                <input type="submit"  class="btn btn-primary btn-user btn-block" value="Guardar Cambios">
                                    
                               
                                
                            </form>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
                 

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