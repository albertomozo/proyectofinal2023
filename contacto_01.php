<?php include "inc_session.php"; ?>
<?php include "admin/inc_config.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
<?php
/* variables particulares de pagina */
$headTitle .= " Contacto";
$headDescription .= "Contacta con nosotros ";
$headKeywords .=""; 
$menugrupo = '';
$menuenlace = 'contacto';
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
<!-- Contact Start -->Envio
<?php 
if ($_POST){
    $textomail = $mailEnvioCabecera;
    foreach ($_POST as $key => $valor){
        $$key = $valor;
    }
    // cuerpo del modelo 
    $textomail .= '<tr>
    <td style="padding:36px 30px 42px 30px;">
      <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
        <tr>
          <td style="padding:0 0 36px 0;color:#153643;">
            <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Creating Email Magic</h1>
            <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan et dictum, nisi libero ultricies ipsum, posuere neque at erat.</p>
            <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="http://www.example.com" style="color:#ee4c50;text-decoration:underline;">In tempus felis blandit</a></p>
          </td>
        </tr>
        <tr>
          <td style="padding:0;">
            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
              <tr>
                <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                  <p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="https://assets.codepen.io/210284/left.gif" alt="" width="260" style="height:auto;display:block;" /></p>
                  <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, est nisi libero ultricies ipsum, in posuere mauris neque at erat.</p>
                  <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="http://www.example.com" style="color:#ee4c50;text-decoration:underline;">Blandit ipsum volutpat sed</a></p>
                </td>
                <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                  <p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="https://assets.codepen.io/210284/right.gif" alt="" width="260" style="height:auto;display:block;" /></p>
                  <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                  Asunto  : '. $asunto .'<br> 
                  Nombre : '.$nombre .'<br>
                  email : '.$email .'<br>
                  Mensaje'.'<br>'.
                  $mensaje.'
                    
                  </p>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>';

    // fin cuerpo del model0
/*     $textomail = "<h1>Mensaje Recibido de la web</h1>";
    $textomail .="<p>Asunto  : $asunto </p>";
    $textomail .="<p>Nombre : $nombre </p>";
    $textomail .="<p>email : $email </p>";
    $textomail .="<p>Mensaje</p>";
    $textomail .= "<p>$mensaje</p>";
    $textomail .= $mailEnvioPie; */
    $textomail .= $mailEnvioPie;
    $asunto = utf8_decode('recepción de formulario página contacto');
    //echo $textomail;
    echo "<p>Gracias $nombre, hemos recibido su mensaje, en breve nos pondremos en contacto con usted a tarvés del correo $email</p> ";

    echo '<hr>';
    //mail($mailto,$asunto,$textomail,$mailheaders);
   //echo '<p>mail('. $mailto.','.$asunto.','.$textomail.','.$mailheaders.')</p>';
    include ('admin/inc_PHPMailer.php');
   
    

} else { ?> 
<div class="container-fluid bg-light overflow-hidden px-lg-0" style="margin: 6rem 0;">
        <div class="container contact px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <h6 class="text-primary">Contactanos</h6>
                        <h1 class="mb-4">Contáctanos sin compromiso</h1>
                        <p class="mb-4"></p>
                        <form name="formlogin" action="" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="Tu Nombre">
                                        <label for="name">Tu Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Tu  Email">
                                        <label for="email">Tu  Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Escribe tu consulta..">
                                        <label for="asunto">Asunto</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Dejanos tu consulta" id="message" name="mensaje" style="height: 100px"></textarea>
                                        <label for="message">Mensaje</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Enviar Mensaje</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d18728.684905698297!2d-1.9765021781178382!3d43.312164511445545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1663937046084!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    <?php } ?>

   


   


        


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