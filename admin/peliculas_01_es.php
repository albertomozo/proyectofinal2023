<?php include("inc_session.php"); ?>
<?php include("inc_config.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
     include("inc_logaccesos.php");
     $headTitle .= " Peliculas";
     $headDescription .= "Muestro la toda lista de peliculas de mi base de datos";
     $headKeywords .=""; 
     $menugrupo = 'pelis';
     if (isset($_GET['estado'])){
        $valorestado = $_GET['estado'];
        $estado=" WHERE estado = '". $_GET['estado'] . "'";
        switch ($valorestado){
            case 'A':
                $menuenlace = 'peliculasA';
                $titulo = 'Lista de Peliculas Activas';
                break;
            case 'D':
                $menuenlace = 'peliculasD';
                $titulo = 'Lista de Peliculas Desactivadas';
                break;
            default :
                $menuenlace = 'peliculas';
                $titulo = 'Lista todas de Peliculas ';
                $estado = '';
                break;
                
        }
     } else {
        $estado = '';
        $menuenlace = 'peliculas';
        $titulo = 'Lista todas las Peliculas';
     }  
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
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $titulo; ?></h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Tmdb Id</th>
                                            <th>Titulo</th>
                                            <th>Cartel</th>
                                            <th>Estreno</th>
                                            <th>Generos</th>
                                            <th>Activar</th>
                                            <th>Editar</th>
                                            <th>Borrar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>Id</th>
                                            <th>Tmdb Id</th>
                                            <th>Titulo</th>
                                            <th>Cartel</th>
                                            <th>Estreno</th>
                                            <th>Generos</th>
                                            <th>Activar</th>
                                            <th>Editar</th>
                                            <th>Borrar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        include("inc_conexion_peliculas.php");
                                    echo  $query = "select * from peliculas $estado";
                $resultado = mysqli_query($conpel,$query);
                //print_r($resultado);
                if(mysqli_num_rows($resultado)!=0){ 
                                    
                    while($fila=mysqli_fetch_array($resultado)){  ?>   
                        <tr id="pel_<?php echo $fila["id"] ?>">
                            
                                <td ><?php echo $fila["id"] ?> </td>
                                <td><?php echo $fila["tmdb_id"] ?></td>
                                <td><?php echo $fila["titulo"] ?></td>
                                <td>
                                    <img src="https://image.tmdb.org/t/p/w154/<?php echo $fila["poster"] ?>" width="50px" />
                                   
                                </td>
                                <td><?php echo $fila["estreno"] ?></td>
                                <td>
                                <?php
                                    $query2= "select genero.genero as generop from genero,peli_genero where peli_genero.peliculaid = ".  $fila['id'] ." and peli_genero.generoid =genero.id";
                                    $resultado2 = mysqli_query($conpel,$query2);
                                    while($fila2=mysqli_fetch_array($resultado2)){
                                        echo $fila2['generop'] . ' ' ;
                                    }
                                ?>
                                </td>
                                <td>
                                    <?php if ($fila['estado']=='A')
                                    {
                                        echo '<a href="peliculas_estado_AD.php?id='. $fila['id'].'&estado=D">desactivar</a>';
                                    } else {
                                        echo '<a href="peliculas_estado_AD.php?id='. $fila['id'].'&estado=A">activar</a>';
                                    }
                                    ?>
                                </td>
                                <td>                
                                <a href="peliculas_editar.php?id=<?php echo $fila['id']; ?>">editar</a>
                                </td>
                                <td><a onClick="pel_borrar('<?php echo $fila['id']; ?>','<?php echo $fila['titulo']; ?>')" href="">borrar</a></td>
                                <script>
                                    function pel_borrar(vid,vtitulo){
                                        if (confirm('¿Estas seguro de borrar la pelicula "' + vtitulo + '" ( ' +vid+' )?')){
                                            location.href="peliculas_borrar.php?id="+vid;
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
    <script src="js/demo/datatables-peliculas.js"></script>
    

</body>

</html>