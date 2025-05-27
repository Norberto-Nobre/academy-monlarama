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
                        <h2 class="text-white">Contacto</h2>
                    </div>
                    <div class="col-md-12">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#!">Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- QUICK CONTACT
        ================================================== -->
        <section class="contact-form pb-0">
            <div class="container mb-2-9 mb-md-6 mb-lg-7">
                <div class="section-heading">
                    <span class="sub-title">NOSSOS CONTACTOS</span>
                    <h3 class="h3 mb-9 font-weight-800 text-secondary">Estamos aqui para ajudar você</h3>
                    <div class="heading-seperator"><span></span></div>
                </div>
                <div class="row mt-n2-9 mb-md-6 mb-lg-7">
                    <div class="col-lg-4 mt-2-9">
                        <div class="contact-wrapper bg-light rounded position-relative h-100 px-4">
                            <div class="mb-4">
                                <i class="contact-icon bi bi-envelope text-secondary"></i>
                            </div>
                            <div>
                                <h4>Email</h4>
                                <ul class="list-unstyled p-0 m-0">
                                    <li><a href="#!">academy@monlarama.ao</a></li>
                                    <!-- <li><a href="#!">info@domain.com</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2-9">
                        <div class="contact-wrapper bg-light rounded position-relative h-100 px-4">
                            <div class="mb-4">
                                <i class="contact-icon bi bi-geo-fill text-secondary"></i>
                            </div>
                            <div>
                                <h4>Localização</h4>
                                <ul class="list-unstyled p-0 m-0">
                                    <li>Luanda —<br> Condomínio Interland, Rua Namibe prédio 13 apt nº 1</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2-9">
                        <div class="contact-wrapper bg-light rounded position-relative h-100 px-4">
                            <div class="mb-4">
                                <i class="contact-icon bi bi-phone text-secondary"></i>
                            </div>
                            <div>
                                <h4>Contactos</h4>
                                <ul class="list-unstyled p-0 m-0">
                                    <li><a href="#!">(+244) 927 218 226</a></li>
                                    <!-- <li><a href="#!">(+44) 123 456 789</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CONTACT FORM
        ================================================== -->
        <section class="bg-very-light-gray py-md-8 pb-lg-0">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="img/team/call3.png" alt="...">
                    </div>
                    <div class="col-lg-6">
                        <div class="faq-form">
                            <h2 class="mb-4 text-secondary">Entre em contacto</h2>
                            <form class="contact quform" action="quform/contact.php" method="post" enctype="multipart/form-data" onclick="">
                                <div class="quform-elements">
                                    <div class="row">

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="name">Seu nome <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="name" type="text" name="name" placeholder="Nome completo" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="email">Seu Email <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="email" type="email" name="email" placeholder="Email" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="subject">Contacto <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="contact" type="text" name="contact" placeholder="Contacto" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="phone">Curso</label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="curso" type="text" name="curso" placeholder="Curso" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Textarea element -->
                                        <div class="col-md-12">
                                            <div class="quform-element form-group">
                                                <label for="message">Mensagem <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Mensagem"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Textarea element -->

                                        <!-- Begin Captcha element -->
                                        <!-- <div class="col-md-12">
                                            <div class="quform-element">
                                                <div class="form-group">
                                                    <div class="quform-input">
                                                        <input class="form-control" id="type_the_word" type="text" name="type_the_word" placeholder="Type the below word" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="quform-captcha">
                                                        <div class="quform-captcha-inner">
                                                            <img src="quform/images/captcha/courier-new-light.png" alt="...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- End Captcha element -->

                                        <!-- Begin Submit button -->
                                        <div class="col-md-12">
                                            <div class="quform-submit-inner">
                                                <button class="butn secondary text-primary" type="submit"><i class="bi bi-send-fill icon-arrow before text-primary"></i><span class="label">Enviar</span><i class="bi bi-send-fill icon-arrow after"></i></button>
                                            </div>
                                            <div class="quform-loading-wrap text-start"><span class="quform-loading"></span></div>
                                        </div>
                                        <!-- End Submit button -->

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- MAP
        ================================================== -->
        <section class="p-0">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3941.7783501305767!2d13.196334375927874!3d-8.90018769115608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a51f4e7a6b7c4d7%3A0x7824faeb757d4a98!2sCondom%C3%ADnio%20interland!5e0!3m2!1spt-PT!2sao!4v1748017774135!5m2!1spt-PT!2sao" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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