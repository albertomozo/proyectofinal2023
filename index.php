<?php include "inc_session.php"; ?>
<?php include "admin/inc_config.php"; ?>
<!DOCTYPE html>
<html lang="es">


<head>
<?php
/* variables particulares de pagina */
/* variables particulares de pagina */
$headTitle .= " Home";
$headDescription .= "Presentación";
$headKeywords .=""; 
$menugrupo = 'index';
$menuenlace = 'index';
include("inc_head.php");
// Incluir la clase Votacion desde el fichero votaciones.php
//include './votaciones.php';
// Activar un objeto de trabajo
// $V = new Votacion();
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


    
    <!-- Projects Start -->
   <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="text-primary">Los proyectos</h6>
                <?php
                  foreach ($grupos as $key => $valor){
                    echo "<h6 class=   \"text-primary\">$key  - $valor</h6>";
                    //$datosCurso = json_encode($valor,true);

                  }
                ?>

                <h1 class="mb-4">Visita los proyectos de la ultima formación</h1>

            </div>
         <!--    <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <li class="mx-2 active" data-filter="*">All</li>
                        <li class="mx-2" data-filter=".first">Solar Panels</li>
                        <li class="mx-2" data-filter=".second">Wind Turbines</li>
                        <li class="mx-2" data-filter=".third">Hydropower Plants</li>
                    </ul>
                </div>
            </div> -->
           
            <div class="row g-4 portfolio-container wow fadeInUp" data-wow-delay="0.5s" id="proyectos">              
            </div>
        </div>
    </div> 
  


    


    

  
  


    <!-- Footer Start -->
    <?php //include ("inc_footer.php");?>
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
     <!-- renderizacion proyectos -->
   <script src="js/proyectos.js"></script>
    <!-- Projects End -->
 
</body>

</html>