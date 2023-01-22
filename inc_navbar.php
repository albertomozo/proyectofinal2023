<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
        <h2 class="m-0 text-primary">Mis Pelis</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link <?php if($menuenlace=='index') { echo 'active';}?>">Home</a>
            <a href="pelis.php" class="nav-item nav-link <?php if($menuenlace=='pelis') { echo 'active';}?>">Peliculas</a>
            <!-- <a href="about.html" class="nav-item nav-link">About</a> -->
            <!-- <a href="service.html" class="nav-item nav-link">Service</a> -->
            <!-- <a href="project.html" class="nav-item nav-link">Project</a> -->
            <!-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="feature.html" class="dropdown-item">Feature</a>
                    <a href="quote.html" class="dropdown-item">Free Quote</a>
                    <a href="team.html" class="dropdown-item">Our Team</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a>
                </div>
            </div> -->
            <a href="generos.php" class="nav-item nav-link <?php if($menuenlace=='generos') { echo 'active';}?>">Generos</a>
            <a href="contacto.php" class="nav-item nav-link <?php if($menuenlace=='contacto') { echo 'active';}?>">Contacto</a>
            <!-- menu mi perfil visible solo si usuario registrado -->
            <?php if (isset($_SESSION['usuario'])){ ?>
                <a href="miperfil.php" class="nav-item nav-link <?php if($menuenlace=='miperfil') { echo 'active';}?>">Mi Perfil</a>
            <?php }?>


        </div>
       
        <?php
       
        //echo session_id();
        if (isset($_SESSION['usuario'])){ ?>
            <a href="usuario_modificacion.php?id=<?php echo $_SESSION['usuarioid'];?>"  class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block"><?php  echo $_SESSION['nombre']; ?> <i class="fa fa-arrow-right ms-3"></i></a> | 
            <a href="logout.php"  class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block"><?php  echo $_SESSION['nombre']; ?> <i class="fa fa-power-off ms-3"></i></a>
        <?php } else { ?>
            <a href="registro.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Hazte pro <i class="fa fa-arrow-right ms-3"></i></a>
            <a href="login.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Accede<i class="fas fa-sign-in"></i></a>
        <?php } ?>
        
    </div>
</nav>
<!-- Navbar End -->