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

        <!-- EVENT LIST
        ================================================== -->
        <section>
            <div class="container">
                <div class="section-heading">
                    <span class="sub-title">latest events</span>
                    <h2 class="h1 mb-0">Our Upcoming Events</h2>
                </div>
                <div class="row g-xxl-5 mt-n2-9">
                    <div class="col-xl-6 mt-2-9">
                        <div class="row g-0 event-wrapper">
                            <div class="col-md-5 event-img bg-img cover-background" data-background="img/content/event-01.jpg">
                            </div>
                            <div class="col-md-7">
                                <div class="p-1-6 p-sm-1-9">
                                    <span class="badge-soft mb-3">art competition</span>
                                    <h4 class="font-weight-800 h5 mb-3"><a href="event-details.php">Graphics design conference</a></h4>
                                    <p class="mb-3 alt-font font-weight-500">Attend the activities and analyze treasured recommendations from the pinnacle eLearn professionals.</p>
                                    <div class="dotted-seprator pt-4 mt-4"></div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0 text-primary font-weight-600"><i class="ti-calendar me-2"></i><span class="text-primary"> 30 Mar. 2023</span></p>
                                        <p class="mb-0 text-primary font-weight-600"><i class="ti-location-pin me-2"></i><span class="text-primary">London</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mt-2-9">
                        <div class="row g-0 event-wrapper">
                            <div class="col-md-5 event-img bg-img cover-background" data-background="img/content/event-02.jpg">
                            </div>
                            <div class="col-md-7">
                                <div class="p-1-6 p-sm-1-9">
                                    <span class="badge-soft secondary mb-3">Learning english</span>
                                    <h4 class="font-weight-800 h5 mb-3"><a href="event-details.php">Important learning english</a></h4>
                                    <p class="mb-3 alt-font font-weight-500">Attend the activities and analyze treasured recommendations from the pinnacle eLearn professionals.</p>
                                    <div class="dotted-seprator pt-4 mt-4"></div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0 text-secondary font-weight-600"><i class="ti-calendar me-2"></i><span class="text-secondary"> 01 Apr. 2023</span></p>
                                        <p class="mb-0 text-secondary font-weight-600"><i class="ti-location-pin me-2"></i><span class="text-secondary">London</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mt-2-9">
                        <div class="row g-0 event-wrapper">
                            <div class="col-md-5 event-img bg-img cover-background" data-background="img/content/event-03.jpg">
                            </div>
                            <div class="col-md-7">
                                <div class="p-1-6 p-sm-1-9">
                                    <span class="badge-soft mb-3">creative day</span>
                                    <h4 class="font-weight-800 h5 mb-3"><a href="event-details.php">Annual creative meetup</a></h4>
                                    <p class="mb-3 alt-font font-weight-500">Attend the activities and analyze treasured recommendations from the pinnacle eLearn professionals.</p>
                                    <div class="dotted-seprator pt-4 mt-4"></div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0 text-primary font-weight-600"><i class="ti-calendar me-2"></i><span class="text-primary"> 02 Apr. 2023</span></p>
                                        <p class="mb-0 text-primary font-weight-600"><i class="ti-location-pin me-2"></i><span class="text-primary">London</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mt-2-9">
                        <div class="row g-0 event-wrapper">
                            <div class="col-md-5 event-img bg-img cover-background" data-background="img/content/event-04.jpg">
                            </div>
                            <div class="col-md-7">
                                <div class="p-1-6 p-sm-1-9">
                                    <span class="badge-soft secondary mb-3">art competition</span>
                                    <h4 class="font-weight-800 h5 mb-3"><a href="event-details.php">Digital arts and reshaping</a></h4>
                                    <p class="mb-3 alt-font font-weight-500">Attend the activities and analyze treasured recommendations from the pinnacle eLearn professionals.</p>
                                    <div class="dotted-seprator pt-4 mt-4"></div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0 text-secondary font-weight-600"><i class="ti-calendar me-2"></i><span class="text-secondary"> 03 Apr. 2023</span></p>
                                        <p class="mb-0 text-secondary font-weight-600"><i class="ti-location-pin me-2"></i><span class="text-secondary">London</span></p>
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