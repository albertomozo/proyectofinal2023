<?php include "inc_session.php"; ?>
<?php include "admin/inc_config.php"; ?>
<!DOCTYPE html>
<html lang="es">


<head>
<?php
/* variables particulares de pagina */
$headTitle .= " Peliculas genero";
$headDescription .= "Muestro la toda lista de peliculas de mi base de datos";
$headKeywords .=""; 
$menugrupo = 'pelis';
$menuenlace = 'pelis';

include("inc_head.php");
// Incluir la clase Votacion desde el fichero votaciones.php
include './votaciones.php';
// Activar un objeto de trabajo
$V = new Votacion();
?>
<!-- Estilo CSS para las estrellas -->
<style type="text/css">
	.estrellas {text-shadow: 0 0 1px #F48F0A; cursor: pointer;  }
	.estrella_dorada { color: gold; }
	.estrella_normal { color: black; }
</style>
<!-- Incluir jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Definir la función de puntuación -->
<script type="text/javascript">
function ratestar($id, $puntuacion){
	$.ajax({
		type: 'GET',
		url: 'votaciones.php',
		data: 'votarElemento='+$id+'&puntuacion='+$puntuacion,
		success: function(data) {
			alert(data);
			location.reload();
		}
	});
}
</script>
</head>

<body>
    <!-- Spinner Start -->
<!--     <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
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
                <h1 class="mb-4">Nuestras recomendaciones</h1>
            </div>
            <div class="row g-4">
                <?php
                $estado = "";
                include ("admin/inc_conexion_peliculas.php");
                include("inc_generos.php"); // genera el array $generosT
                $queryPlus = '';
                $generoA = '';
                $generoV = 0;
                if (isset( $_REQUEST['genero'])){$queryPlus= 'AND peli_genero.generoid='. $_REQUEST['genero'] ;
                $generoV =$_REQUEST['genero']; }
                echo '<div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">';
                foreach ($generosT as $key => $valor){
                    $generoA = '';
                    if ($key == $generoV ) { $generoA = 'active';}
                    echo '<button class="btn btn-primary w-100 '. $generoA .'" type="button" data-genero="'.$key.'" onClick="peliculasFiltarGenero('.$key.')">
                    <i class="fas fa-search fa-sm"></i>'.$valor.'('.$key.')
                </button>';
                                  
                }
                echo '</div>';
            

              
               
                //$query = "select * from peliculas $estado";
                 $query = "select * from peliculas,peli_genero
                          where peliculas.id = peli_genero.peliculaid and  peliculas.estado = 'A' $queryPlus";
                
                
                
                $resultado = mysqli_query($conpel,$query);
                //print_r($resultado);
                if(mysqli_num_rows($resultado)!=0){ 
                                    
                    while($fila=mysqli_fetch_array($resultado)){  ?> 
                

                        <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item rounded overflow-hidden">
                                <?php // OBTENCION DE GENEROS DE UNA PELI 
                                echo $query2 = "SELECT * FROM peli_genero WHERE peliculaid = " . $fila['id'];
                                $resultado2 =  mysqli_query($conpel,$query2);
                                $clasesGenero = '';
                                $textoGenero ='';
                                while ($fila2=mysqli_fetch_assoc($resultado2))
                                {
                                    $clasesGenero .= 'genero-'.$fila2['generoid'] . ' ';  
                                    $textoGenero .= $generosT[$fila2['generoid']] .' ';
                                }
                                echo $clasesGenero;
                                ?>
                                <article id="<?php echo $fila['id'];?>" class="<?php echo $clasesGenero;?>">
                                    <img class="img-fluid" src="https://image.tmdb.org/t/p/w154/<?php echo $fila["poster"]; ?>" alt="">
                                    <div class="position-relative p-4 pt-0">
                                        <div class="service-icon">
                                            <i class="fa fa-film fa-3x"></i>
                                        </div>
                                        <h4 class="mb-3"><?php echo $fila['titulo'];?></h4>
                                        <p><?php echo substr($fila['overview'],0,150);?></p>
                                        <p>Estreno : <?php echo $fila['estreno'];?></p>
                                        <p>Generos : <?php echo $textoGenero;?></p>

                                        <a class="small fw-medium" href="pelicula_detalle.php?id=<?php echo $fila['id'];?>">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                                        <p class="small fw-medium">Valoración media: <?php echo $V->obtener_la_puntuacion_de($fila['id']);?></p>
                                        <p class="small fw-medium"> <?php echo $V->mostrar_estrellitas_para($fila['id']);?></p>

                                        <!-- favoritos -->
                                        <?php if (isset($_SESSION['rol'])){
                                            if ($_SESSION['rol']!='I'){
                                        
                                            
                                            ?>
                                            <a class="small fw-medium" href="pelicula_detalle.php?id=<?php echo $fila['id'];?>">Favorito<i class="fa fa-arrow-right ms-2"></i></a>
                                        <?php } } ?>
                                        <!-- fin favoritos -->

                                    </div>
                                </article>
                            </div>
                        </div>
                    <?php } // fin while
                } else {
                    echo '<p>No hay peliculas</p>';
                }
                ?>


                </div>
        </div>
    </div>
    <!-- Peliculas End -->
   




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
    <script>
        function peliculasFiltarGenero(genero)
        {
          location.href='pelis_genero_back.php?genero='+genero;
        }

    </script>
</body>

</html>