   <!-- Topbar Start -->
   <script>
        // crea un nuevo objeto `Date`
        var today = new Date();
        // obtener la fecha y la hora
        var now = today.toLocaleString();
   </script>
   <div class="container-fluid bg-dark p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Donosti</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>  <?php echo 'Serv: '. date("Y/m/d H:i:s"); ?> |  <script>document.write('Local: ' + now);</script></small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+666 666 666</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                   <!--  <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-twitter"></i></a> -->
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href="https://www.linkedin.com/in/alberto-mozo-avellaned-80615713" target="_blank"><i class="fab fa-linkedin-in" ></i></a>
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href="https://github.com/albertomozo" target="_blank"><i class="fab fa-github"></i></a>
                    <a class="btn btn-square btn-link rounded-0" href="https://www.youtube.com/channel/UCkbTI1wb0cLKkiNi1Sd9WbA" target="_blank"><i class="fab fa-youtube"></i></a>

                    <!-- <a class="btn btn-square btn-link rounded-0" href=""><i class="fab fa-instagram"></i></a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->