<?php
include_once('base.php'); 
?>

<body>

    <!-- PAGE LOADING
    ================================================== -->
    <div id="preloader"></div>

    <!-- MAIN WRAPPER
    ================================================== -->
    <div class="main-wrapper">

        <!-- HEADER
        ================================================== -->
       <?php
        include_once('header.php'); 
        ?>

        <!-- PAGE TITLE
        ================================================== -->
       <section class="page-title-section bg-img cover-background top-position1 left-overlay-dark" data-overlay-dark="9" data-background="img/content/bannzdegrad1.jpg">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h2 class="text-white">Eventos</h2>
                    </div>
                    <div class="col-md-12">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#!">Eventos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- EVENT LIST
        ================================================== -->
        <section>
            <div class="container pt-0 mt-0">
                <div class="section-heading">
                    <span class="sub-title">EVENTOS</span>
                    <h2 class="h3 mb-0 text-secondary">Nossos próximos eventos</h2>
                </div>
                <div class="row g-xxl-5 mt-n2-9">
                    <div class="col-xl-6 mt-2-9">
                        <div class="row g-0 event-wrapper">
                            <div class="col-md-5 event-img bg-img cover-background" data-background="img/content/bg-08.jpg">
                            </div>
                            <div class="col-md-7">
                                <div class="p-1-6 p-sm-1-9">
                                    <span class="badge-soft mb-3 bg-primary text-secondary">Conferência</span>
                                    <h4 class="font-weight-800 h5 mb-3"><a href="event-details.php">Conferência e Master Class Fusões e Aquisições</a></h4>
                                    <p class="mb-3 alt-font font-weight-500">
                                        A conferência master Class sobre Fusões e Aquisições (M&A) oferece uma análise abrangente dos
                                        processos de combinação empresarial, com foco específico no mercado angolano. Durante 6 horas
                                        de formação, os participantes explorarão desde os fundamentos conceituais até aspectos práticos
                                        e estratégicos das operações de M&A.
                                    </p>
                                    <div class="dotted-seprator pt-4 mt-4"></div>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0 text-primary font-weight-600"><i class="bi bi-calendar me-2 text-secondary"></i><span class="text-secondary"> 30 Set. 2025</span></p>
                                        <p class="mb-0 text-primary font-weight-600"><i class="bi bi-geo-alt me-2 text-secondary"></i><span class="text-secondary">Condomínio Interland</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-xl-6 mt-2-9">
                        <div class="row g-0 event-wrapper">
                            <div class="col-md-5 event-img bg-img cover-background" data-background="img/content/bg-08.jpg">
                            </div>
                            <div class="col-md-7">
                                <div class="p-1-6 p-sm-1-9">
                                    <span class="badge-soft mb-3 bg-primary text-secondary">Conferência</span>
                                    <h4 class="font-weight-800 h5 mb-3"><a href="event-details.php">Conferência e Master Class Fusões e Aquisições</a></h4>
                                    <p class="mb-3 alt-font font-weight-500">
                                        A conferência master Class sobre Fusões e Aquisições (M&A) oferece uma análise abrangente dos
                                        processos de combinação empresarial, com foco específico no mercado angolano. Durante 6 horas
                                        de formação, os participantes explorarão desde os fundamentos conceituais até aspectos práticos
                                        e estratégicos das operações de M&A.
                                    </p>
                                    <div class="dotted-seprator pt-4 mt-4"></div>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0 text-primary font-weight-600"><i class="bi bi-calendar me-2 text-secondary"></i><span class="text-secondary"> 30 Set. 2025</span></p>
                                        <p class="mb-0 text-primary font-weight-600"><i class="bi bi-geo-alt me-2 text-secondary"></i><span class="text-secondary">Condomínio Interland</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER
        ================================================== -->
        <?php include 'footer.php'; ?>

    </div>

    <!-- BUY TEMPLATE
    ================================================== -->
     <div class="buy-theme alt-font d-none d-lg-inline-block"><a href="#" target="_blank"><i class="bi bi-cart-plus-fill"></i><span>Carinho de compra</span></a></div>

    <div class="all-demo alt-font d-none d-lg-inline-block"><a href="#" target="_blank"><i class="bi bi-envelope"></i><span>Entrar em contacto</span></a></div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- popper js -->
    <script src="js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- core.min.js -->
    <script src="js/core.min.js"></script>

    <!-- search -->
    <script src="search/search.js"></script>

    <!-- custom scripts -->
    <script src="js/main.js"></script>

    <!-- form plugins js -->
    <script src="quform/js/plugins.js"></script>

    <!-- form scripts js -->
    <script src="quform/js/scripts.js"></script>

    <!-- all js include end -->
    
</body>

</html>