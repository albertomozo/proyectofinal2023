<?php include("inc_session.php"); ?>
<?php include("inc_config.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
     $headTitle .= " Usuario Lista";
     $headDescription .= "Lista de usuarios de la tabla";
     $headKeywords .=""; 
     $menugrupo = 'usuarios';
     $menuenlace = 'usuarios'; 
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
                
                  
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Editar Usuarios</h1>
<p class="mb-4">titulo 2</p>

<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Usuario Editar </h6>
    </div>
    <div class="card-body">
    <?php
    include("inc_conexion_peliculas.php");
    if ($_POST){
        //foreach ($_POST as $key => $valor) {echo "<p>$key = $valor</p>";}
        $id = $_POST['id'];
        $nombre = mysqli_real_escape_string($conpel,$_POST['nombre']);
        $apellidos = mysqli_real_escape_string($conpel,$_POST['apellidos']);
        $mail = mysqli_real_escape_string($conpel,$_POST['mail']);
        $telefono = mysqli_real_escape_string($conpel,$_POST['telefono']);
        $estado = mysqli_real_escape_string($conpel,$_POST['estado']);
        $rol = mysqli_real_escape_string($conpel,$_POST['rol']);
        echo $query = 
        "UPDATE usuarios 
        SET nombre= '$nombre',
            apellidos= '$apellidos',
            mail= '$mail',
            telefono='$telefono',
            estado= '$estado',
            rol = '$rol'
        WHERE id=$id";
        $resultado = mysqli_query($conpel,$query);
        if (!$resultado){
            echo "<p>Error en la actualizaciuón <br> $query</p>";
        }

    } else {
        $id=$_GET['id'];
    }

    echo  $query = "select * from usuarios where id = $id";
    $resultado = mysqli_query($conpel,$query);
    //print_r($resultado);
    if(mysqli_num_rows($resultado)!=0){
        $fila = mysqli_fetch_assoc($resultado);
        $nombre = $fila['nombre'];
        $apellidos = $fila['apellidos'];
        $mail = $fila['mail'];
        $telefono = $fila['telefono'];
        $estado = $fila['estado'];
        $rol = $fila['rol'];

    }
                


     ?>  

<!-- form -->
<div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block ">
                    <?php 
                    echo $ficheroPerfil = $_SERVER['DOCUMENT_ROOT'].$sitioRutaLocal.$rutaImagenesPerfil . 'perf_'.$id.'.gif';
                    if (file_exists( $ficheroPerfil))
                    {
                        $imagenPerfil = 'img/perfil/'. 'perf_'.$id.'.gif';
                    } else {
                        $imagenPerfil = 'img/perfil/undraw_profile.svg';
                    }
                    if (isset($_GET['msg'])) {echo '<p>' . $_GET['msg'] .'</p>'; }
                    ?>

                        <img src="<?php echo $imagenPerfil;  ?>"  />  

                        <form name="formfoto" action="usuario_subir_foto.php" 
                        method="POST"
                        enctype="multipart/form-data">
                            <input type="file" name="imagen" >
                            <input type="hidden" name="id" value ="<?php echo $id;?>">
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="subir foto">
                        </form>
                
                
                
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Editar Usuario</h1>
                            </div>
                            <form class="user" method="POST" action="" >
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="hidden" name="id" value="<?php echo $id;?>">
                                        <p>Nombre</p>
                                        <input type="text" class="form-control form-control-user" id="nombre" name="nombre"
                                            placeholder="nombre" value="<?php echo $nombre;?>">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p>Apellidos</p>
                                        <input type="text" class="form-control form-control-user" id="apellidos" name="apellidos"
                                            placeholder="apellidos" value="<?php echo $apellidos;?>">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p>mail</p>
                                        <input type="text" class="form-control form-control-user" id="mail" name="mail"
                                            placeholder="mail" value="<?php echo $mail;?>">
                                        <p>telefono</p>
                                        <input type="text" class="form-control form-control-user" id="telefono" name="telefono"
                                            placeholder="telefono" value="<?php echo $telefono;?>">
                                    </div>






                               <!--      <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div> -->
                                </div>
                                <div class="form-group">
                                <!-- ROL    A : Administrador U : usuario I : invitado E: Editor 
                                leer del array rolesT de config  -->
                                <p>Rol : 
                                    
                                    <SELECT  name="rol"> 
                                        <OPTION value="A" <?php if ($rol== 'A' ) {echo 'SELECTED';}?> >Administrador</OPTION>
                                        <OPTION value="U" <?php if ($rol== 'U' ) {echo 'SELECTED';}?>>Usuario</OPTION>
                                        <OPTION value="I" <?php if ($rol== 'I' ) {echo 'SELECTED';}?>>Invitado</OPTION>
                                        <OPTION value="E" <?php if ($rol== 'E' ) {echo 'SELECTED';}?>>Editor</OPTION>
                                    </SELECT>

                                           

                                <!--  ESTADO A : Activo P: Preinscrito D: Desactivado B: Borrado -->
                                <fieldset value="ESTADO">
                                <P>ESTADO<br>
                                    Activo : <INPUT type="radio" name="estado" value="A" <?php if($estado=='A'){echo 'CHECKED';}?>><br/>
                                    Preinscrito : <INPUT type="radio" name="estado" value="P" <?php if($estado=='P'){echo 'CHECKED';}?>><br/>
                                    Desactivado : <INPUT type="radio" name="estado" value="D" <?php if($estado=='D'){echo 'CHECKED';}?>><br/>
                                    Borrado : <INPUT type="radio" name="estado" value="B" <?php if($estado=='B'){echo 'CHECKED';}?>><br>
                                </fieldset>


                                </div>
                               
                                <input type="submit"  class="btn btn-primary btn-user btn-block" value="Guardar Cambios">
                                    
                               
                                
                            </form>
                         
                        </div>
                    </div>
                </div>
            </div>



<!-- fin form -->

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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

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