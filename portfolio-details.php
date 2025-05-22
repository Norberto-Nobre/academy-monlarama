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
                        <h1>Portfolio Details</h1>
                    </div>
                    <div class="col-md-12">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#!">Portfolio Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- PORTFOLIO DETAILS
        ================================================== -->
        <section>
            <div class="container"> 
                <div class="col-12">
                    <div class="text-center mb-5">
                        <img src="img/portfolio/portfolio-details-01.jpg" class="primary-shadow border-radius-5" alt="...">
                    </div>
                    <div class="row bg-secondary border-radius-5 mb-1-9 p-1-9">
                        <div class="col-sm-6 col-lg-3 mb-1-9 mb-lg-0">
                            <div class="d-flex">
                                <i class="ti-tag text-white display-18"></i>
                                <div class="ms-3">
                                    <h4 class="mb-1 h5 text-white">Category:</h4>
                                    <span class="text-white opacity9">Other</span>  
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-1-9 mb-lg-0">
                            <div class="d-flex">
                                <i class="ti-user text-white display-18"></i>
                                <div class="ms-3">
                                    <h4 class="mb-1 h5 text-white">Client:</h4>
                                    <span class="text-white opacity9">Casey Solano</span>  
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-1-9 mb-sm-0">
                            <div class="d-flex">
                                <i class="ti-timer text-white display-18"></i>
                                <div class="ms-3">
                                    <h4 class="mb-1 h5 text-white">Date:</h4>
                                    <span class="text-white opacity9">12, Feb 2023</span>  
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex">
                                <i class="ti-money text-white display-18"></i>
                                <div class="ms-3">
                                    <h4 class="mb-1 h5 text-white">Cost:</h4>
                                    <span class="text-white opacity9">$225.00</span>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Project Overview</h3>
                    <p class="mb-1-4">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</p>
                    <h3>Project Summary</h3>
                    <p class="mb-1-4 w-lg-95">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                    <div class="row mt-n1-9">
                        <div class="col-lg-6 mt-1-9">
                            <div class="card border-radius-5 h-100 border-color-light-black">
                                <div class="card-body py-4 px-1-9 px-xl-2-6">
                                    <h3 class="h5">Challenges</h3>
                                    <ul class="list-style1 list-unstyled mb-0">
                                        <li>In a free hour, when our force of decision is unhampered.</li>
                                        <li>Certain conditions claims obligation or the commitments.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-1-9">
                            <div class="card border-radius-5 h-100 border-color-light-black">
                                <div class="card-body py-4 px-1-9 px-xl-2-6">
                                    <h3 class="h5">Solutions</h3>
                                    <ul class="list-style1 mb-0 list-unstyled">
                                        <li>Renounced and inconveniences acknowledged.</li>
                                        <li>Force of decision is unrestricted and when nothing.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-navigation mt-6">
                    <div class="prev-page">
                        <div class="page-info">
                            <a href="#!">
                                <span class="image-prev"><img src="img/portfolio/prev-portfolio.jpg" alt="..."></span>
                                <div class="prev-link-page-info">
                                    <h4 class="prev-title">Create Animation</h4>
                                    <span class="date-details"><span class="create-date">March 20, 2023</span></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="next-page">
                        <div class="page-info">
                            <a href="#!">
                                <div class="next-link-page-info">
                                    <h4 class="next-title">Business Research</h4>
                                    <span class="date-details"><span class="create-date">March 27, 2023</span></span>
                                </div>
                                <span class="image-next"><img src="img/portfolio/next-portfolio.jpg" alt="..."></span>
                            </a>
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

    <!-- start scroll to top -->
    <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <!-- end scroll to top -->

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