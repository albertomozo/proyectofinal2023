<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center <!-- justify-content-center" href="index.html">
               <div class="sidebar-brand-icon rotate-n-15">
                   <!--  <i class="fas fa-laugh-wink"></i> -->
                   <img src="./img/alberto.gif" width="50px">
                </div>    
                <div class="sidebar-brand-text mx-3">Pelis <sup>1.0</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            
            <?php if(!isset($menuenlace))
            {   $menuenlace= 'error';
                $menugrupo = 'error';
                echo "<p>$pagina</p>";
            }
            ?>
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Panel de Control</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-film"></i>
                    <!-- <i class="fas fa-fw fa-cog"></i> -->
                    <span>Pelis</span>
                </a>
                <div id="collapseTwo" class="collapse <?php if($menugrupo == 'pelis') { echo 'show'; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pelicula</h6>
                        <a class="collapse-item <?php if ($menuenlace == 'peliculas') {echo 'active'; }?>" href="peliculas.php">lista de peliculas</a>
                        <a class="collapse-item <?php if ($menuenlace == 'peliculasA') {echo 'active'; }?>" href="peliculas.php?estado=A">Peliculas Activas</a>
                        <a class="collapse-item <?php if ($menuenlace == 'peliculasD') {echo 'active'; }?>" href="peliculas.php?estado=D">Peliculas NO Activas</a>
                        <a class="collapse-item <?php if ($menuenlace == 'peliculas_buscar') {echo 'active'; }?>" href="peliculas_buscar.php?search=">buscar peliculas</a>
                        <a class="collapse-item <?php if ($menuenlace == 'actores') {echo 'active'; }?>" href="actores.php?search=">actores</a>
                      
                    </div>
                </div>
            </li>

            <!-- Nav Item - usuarios Collapse Menu -->
            <?php if ($rol=='A') {?> 
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                  <i class="fas fa-fw fa-user"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseUtilities" class="collapse <?php if($menugrupo == 'usuarios') { echo 'show'; } ?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Usuarios :</h6>
                        <a class="collapse-item <?php if ($menuenlace == 'listausuarios') {echo 'active'; }?>" href="usuarios.php">usuarios</a>
                        <a class="collapse-item <?php if ($menuenlace == 'conexiones') {echo 'active'; }?>" href="conexiones.php">conexiones</a>
                        <a class="collapse-item <?php if ($menuenlace == 'a2') {echo 'active'; }?>" href="actores2.php">actores 2</a>
                       
                    </div>
                </div>
            </li>
            <?php } ?>
            <!-- Nav Item - EStadisticas  -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEst"
                    aria-expanded="true" aria-controls="collapseEst">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <!-- <i class="fas fa-fw fa-cog"></i> -->
                    <span>Estadisticas</span>
                </a>
                <div id="collapseEst" class="collapse <?php if($menugrupo == 'estadisticas') { echo 'show'; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">EStadisticas</h6>
                        <a class="collapse-item <?php if ($menuenlace == 'est_peliculas') {echo 'active'; }?>" href="estadisticas_peliculas.php">Peliculas</a>
                        <a class="collapse-item <?php if ($menuenlace == 'est_generos') {echo 'active'; }?>" href="estadisticas_generos.php">Generos</a>
                        
                    </div>
                </div>
            </li>



            <!-- Divider -->
            <?php if($menugrupo == 'error') {?>
            <hr class="sidebar-divider">

            <!-- Nav Item - Errorres Collapse Menu -->
            <li class="nav-item" >
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                  <i class="fas fa-fw fa-user"></i>
                    <span>Errores</span>
                </a>
                <div id="collapseUtilities" class="collapse <?php if($menugrupo == 'error') { echo 'show'; } ?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Errores:</h6>
                        <?php if($menugrupo == 'error') 
                        { echo '<p>error de pagina<p>';                            
                            echo "<p>$pagina<p>";
                         } 
                        ?>"
                        
                       
                    </div>
                </div>
            </li>
            <?php }?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Addons
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
 -->
            <!-- Nav Item - Charts -->
    <!--         <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>
 -->
            <!-- Nav Item - Tables -->
  <!--           <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
          <!--   <hr class="sidebar-divider d-none d-md-block"> -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
    <!--         <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

        </ul>