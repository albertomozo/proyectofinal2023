<?php include "inc_session.php"; ?>
<?php include "admin/inc_config.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
<?php
/* variables particulares de pagina */
$headTitle .= " Login";
$headDescription .= "login de acceso ";
$headKeywords .=""; 
$menugrupo = '';
$menuenlace = '';
include("inc_head.php");
?>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <?php include("inc_topbar.php");?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php include ("inc_navbar.php"); ?>
    <!-- Navbar End -->
     


    <!-- Contact Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0" >
        <div class="container contact px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <h6 class="text-primary">Accesos A Paltaforma</h6>
                        <h1 class="mb-4">Introduce tus datos</h1>
                        <p class="mb-4">
                        <?php 
                            /* seria interesante meterlo en un include para mejorar las actulaizaciones */ 
                            if (isset($_REQUEST['msg'])){
                                /* mirar codigo de admin/login.php */
                                switch ($_REQUEST['msg'])
                                        {
                                            case 1:
                                                $texto = "Error de autentificación";
                                                break;
                                            case 2:
                                                $texto = "Desconexión correcta";
                                                break;
                                            case 3:
                                                    $texto = "vienes de la pagina caducada ";
                                                    break;
                                            case 4:
                                                 $texto = "Contacta con administración";
                                                    break;
                                            default : 
                                                $texto = "Ups !! que ha pasado";
                                                break;
                                        }
                                        echo $texto;
                            }
                            

                        ?>
                        </p>
                        <form name="formlogin" action="admin/login_acceso.php" method="POST">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Tu usuario...">
                                        <label for="usuario">Usuario:</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Tu clave...">
                                        <label for="password">Clave</label>
                                    </div>
                                </div>
                                <input type="hidden" name="origen" value="web">
                                
                               
                                <div class="col-12">
                                    <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Accede</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <!-- <div class="position-relative h-100">
                        <iframe class="position-absolute w-100 h-100" style="object-fit: cover;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


  


    
    



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
</body>

</html>