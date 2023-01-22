<?php include("inc_session.php"); ?>
<?php include("inc_config.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
     if ($rol != 'A') { header("location:caducada.php"); }
     $headTitle .= " |  Usuarios";
     $headDescription .= "Muestro la  lista de usuarios de mi base de datos";
     $headKeywords .=""; 
     $menugrupo = 'usuarios';
     $menuenlace = 'listausuarios';   
    include("inc_logaccesos.php");
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
                        <h1 class="h3 mb-0 text-gray-800">Lista de Usuarios</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Mail</th>
                                            <th>Telefono</th>
                                            <th>Rol</th>
                                            <th>Estado</th>
                                            <th>Editar</th>
                                            <th>Borrar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th></th>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Mail</th>
                                            <th>Telefono</th>
                                            <th>Rol</th>
                                            <th>Estado</th>
                                            <th>Editar</th>
                                            <th>Borrar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        include("inc_conexion_peliculas.php");
                                     $query = "select * from usuarios";
                $resultado = mysqli_query($conpel,$query);
                //print_r($resultado);
                if(mysqli_num_rows($resultado)!=0){ 
                                    
                    while($fila=mysqli_fetch_array($resultado)){  ?>   
                        <tr id="pel_<?php echo $fila["id"] ?>">
                               <td>
                                    <!-- <img src="https://image.tmdb.org/t/p/w154/<?php //echo $fila["poster"] ?>" width="50px" /> -->
                                    <?php 
                                    $img_perfil = "img/perfil/perf_".$fila["id"].".gif";
                                    if (!file_exists("$img_perfil")) { $img_perfil = "img/undraw_profile.svg";}  ?>
                                    <img class="img-profile rounded-circle"
                                        src="<?php echo $img_perfil ;?>" width="20px">
                                   
                                </td>
                                <td ><?php echo $fila["id"] ?> </td>
                                <td><?php echo $fila["nombre"] ?></td>
                                <td><?php echo utf8_encode($fila["apellidos"]) ?></td>
                             
                                <td><?php echo $fila["mail"] ?></td>
                                <td>
                                <?php
                                    
                                        echo utf8_encode($fila["telefono"]);
                                ?>
                                </td>
                                <td>
                                    <?php echo $fila['rol']; ?>   
                                </td>
                                <td>
                                    <?php echo $fila['estado']; ?>   
                                </td>
                                <td>                
                                <a href="usuarios_editar.php?id=<?php echo $fila['id']; ?>">editar</a></td>
                                <td><a onClick="usu_borrar('<?php echo $fila['id']; ?>')" >borrar</a></td>
                                <script>
                                    function usu_borrar(vid){
                                        if (confirm('¿Estas seguro de borrar al usuarios con id = ' + vid + '?')){
                                            location.href="usuarios_borrar.php?id="+vid;
                                        }
                                    }

                                </script>
                            
                    </tr>
                    <?php } // FIN WHILE 
                    } else {
                        echo '<p> No hay pelis</p>';
                    }
                    mysqli_close($conpel);
                    ?>
                    </tbody>
                </table>
                </div> <!-- table responsive -->


                    
                 

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
     <!-- Page level plugins -->
     <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    

</body>

</html>