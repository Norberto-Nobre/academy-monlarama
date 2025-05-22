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
        <?php
        include_once('banner.php'); 
        ?>

        <!-- QUICK CONTACT
        ================================================== -->
        <section class="contact-form pb-0">
            <div class="container mb-2-9 mb-md-6 mb-lg-7">
                <div class="section-heading">
                    <span class="sub-title">OUR CONTACTS</span>
                    <h2 class="mb-9 display-16 display-sm-14 display-lg-10 font-weight-800">We`re here to Help You</h2>
                    <div class="heading-seperator"><span></span></div>
                </div>
                <div class="row mt-n2-9 mb-md-6 mb-lg-7">
                    <div class="col-lg-4 mt-2-9">
                        <div class="contact-wrapper bg-light rounded position-relative h-100 px-4">
                            <div class="mb-4">
                                <i class="contact-icon ti-email"></i>
                            </div>
                            <div>
                                <h4>Email Here</h4>
                                <ul class="list-unstyled p-0 m-0">
                                    <li><a href="#!">example@cloud.com</a></li>
                                    <li><a href="#!">info@domain.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2-9">
                        <div class="contact-wrapper bg-light rounded position-relative h-100 px-4">
                            <div class="mb-4">
                                <i class="contact-icon ti-map-alt"></i>
                            </div>
                            <div>
                                <h4>Location Here</h4>
                                <ul class="list-unstyled p-0 m-0">
                                    <li>New York —<br> 18 N 3rd E Street Downey, Lechase Park, United States.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2-9">
                        <div class="contact-wrapper bg-light rounded position-relative h-100 px-4">
                            <div class="mb-4">
                                <i class="contact-icon ti-mobile"></i>
                            </div>
                            <div>
                                <h4>Call Here</h4>
                                <ul class="list-unstyled p-0 m-0">
                                    <li><a href="#!">+44 205-658-1823</a></li>
                                    <li><a href="#!">(+44) 123 456 789</a></li>
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
                        <img src="img/content/contact-img-01.jpg" alt="...">
                    </div>
                    <div class="col-lg-6">
                        <div class="faq-form">
                            <h2 class="mb-4 text-primary">Get In Touch</h2>
                            <form class="contact quform" action="quform/contact.php" method="post" enctype="multipart/form-data" onclick="">
                                <div class="quform-elements">
                                    <div class="row">

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="name">Your Name <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="name" type="text" name="name" placeholder="Your name here" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="email">Your Email <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="email" type="text" name="email" placeholder="Your email here" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="subject">Your Subject <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="subject" type="text" name="subject" placeholder="Your subject here" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="phone">Contact Number</label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="phone" type="text" name="phone" placeholder="Your phone here" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Textarea element -->
                                        <div class="col-md-12">
                                            <div class="quform-element form-group">
                                                <label for="message">Message <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Tell us a few words"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Textarea element -->

                                        <!-- Begin Captcha element -->
                                        <div class="col-md-12">
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
                                        </div>
                                        <!-- End Captcha element -->

                                        <!-- Begin Submit button -->
                                        <div class="col-md-12">
                                            <div class="quform-submit-inner">
                                                <button class="butn secondary" type="submit"><i class="far fa-paper-plane icon-arrow before"></i><span class="label">Send Message</span><i class="far fa-paper-plane icon-arrow after"></i></button>
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
            <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=london&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
        </section>

        <!-- FOOTER
        ================================================== -->
        <?php include 'footer.php'; ?>

    </div>

    <!-- BUY TEMPLATE
    ================================================== -->
    <div class="buy-theme alt-font d-none d-lg-inline-block"><a href="https://wrapbootstrap.com/theme/elearn-online-education-learning-template-WB0836C05" target="_blank"><i class="fas fa-cart-plus"></i><span>Buy Template</span></a></div>

    <div class="all-demo alt-font d-none d-lg-inline-block"><a href="https://www.chitrakootweb.com/contact.php" target="_blank"><i class="far fa-envelope"></i><span>Quick Question?</span></a></div>

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