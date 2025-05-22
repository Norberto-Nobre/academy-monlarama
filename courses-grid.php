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

        <!-- ONLINE COURSES
        ================================================== -->
        <section>
            <div class="container">
                <div class="section-heading">
                    <span class="sub-title">discover new</span>
                    <h2 class="h1 mb-0">Our Online Courses</h2>
                </div>
                <div class="row g-xxl-5 mt-n2-6">
                    <div class="col-md-6 col-xl-4 mt-2-6">
                        <div class="card card-style1 p-0 h-100">
                            <div class="card-img rounded-0">
                                <div class="image-hover">
                                    <img class="rounded-top" src="img/content/courses-01.jpg" alt="...">
                                </div>
                                <a href="courses-list.php" class="course-tag">Business</a>
                                <a href="#!"><i class="far fa-heart"></i></a>
                            </div>
                            <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                                <div class="card-author d-flex">
                                    <div class="avatar">
                                        <img class="rounded-circle" src="img/avatar/avatar-01.jpg" alt="...">
                                    </div>
                                    <h4 class="mb-0 h6">Elijah Lions</h4>
                                </div>
                                <div class="pt-6">
                                    <h3 class="h4 mb-4"><a href="course-details.php">Figuring out how to compose as an expert creator</a></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="display-30"><i class="ti-agenda me-2"></i>10 Lessons</div>
                                        <div class="display-30"><i class="ti-user me-2"></i>23</div>
                                        <div class="display-30"><i class="fas fa-star me-1 display-32 text-warning"></i>5.00(1)</div>
                                    </div>
                                    <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                        <span class="badge-soft">all levels</span>
                                        <h5 class="text-primary mb-0">$55.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mt-2-6">
                        <div class="card card-style1 p-0 h-100">
                            <div class="card-img rounded-0 border-color-secondary">
                                <div class="image-hover">
                                    <img class="rounded-top" src="img/content/courses-02.jpg" alt="...">
                                </div>    
                                <a href="courses-list.php" class="course-tag secondary">Design</a>
                                <a href="#!"><i class="far fa-heart"></i></a>
                            </div>
                            <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                                <div class="card-author d-flex">
                                    <div class="avatar">
                                        <img class="rounded-circle" src="img/avatar/avatar-02.jpg" alt="...">
                                    </div>
                                    <h4 class="mb-0 h6">Georgia Train</h4>
                                </div>
                                <div class="pt-6">
                                    <h3 class="h4 mb-4"><a href="course-details.php">Configuration instruments for communication</a></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="display-30"><i class="ti-agenda me-2"></i>09 Lessons</div>
                                        <div class="display-30"><i class="ti-user me-2"></i>15</div>
                                        <div class="display-30"><i class="fas fa-star me-1 display-32 text-warning"></i>4.00(2)</div>
                                    </div>
                                    <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                        <span class="badge-soft secondary">beginner</span>
                                        <h5 class="text-secondary mb-0">$35.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mt-2-6">
                        <div class="card card-style1 p-0 h-100">
                            <div class="card-img rounded-0">
                                <div class="image-hover">
                                    <img class="rounded-top" src="img/content/courses-03.jpg" alt="...">
                                </div>    
                                <a href="courses-list.php" class="course-tag">Network</a>
                                <a href="#!"><i class="far fa-heart"></i></a>
                            </div>
                            <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                                <div class="card-author d-flex">
                                    <div class="avatar">
                                        <img class="rounded-circle" src="img/avatar/avatar-03.jpg" alt="...">
                                    </div>
                                    <h4 class="mb-0 h6">Christian Hope</h4>
                                </div>
                                <div class="pt-6">
                                    <h3 class="h4 mb-4"><a href="course-details.php">Introduction to community training course</a></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="display-30"><i class="ti-agenda me-2"></i>20 Lessons</div>
                                        <div class="display-30"><i class="ti-user me-2"></i>20</div>
                                        <div class="display-30"><i class="fas fa-star me-1 display-32 text-warning"></i>5.00(3)</div>
                                    </div>
                                    <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                        <span class="badge-soft">Expert</span>
                                        <h5 class="text-primary mb-0">$99.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mt-2-6">
                        <div class="card card-style1 p-0 h-100">
                            <div class="card-img rounded-0 border-color-secondary">
                                <div class="image-hover">
                                    <img class="rounded-top" src="img/content/courses-04.jpg" alt="...">
                                </div>
                                <a href="courses-list.php" class="course-tag secondary">Photography</a>
                                <a href="#!"><i class="far fa-heart"></i></a>
                            </div>
                            <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                                <div class="card-author d-flex">
                                    <div class="avatar">
                                        <img class="rounded-circle" src="img/avatar/avatar-04.jpg" alt="...">
                                    </div>
                                    <h4 class="mb-0 h6">Reema Hawadah</h4>
                                </div>
                                <div class="pt-6">
                                    <h3 class="h4 mb-4"><a href="course-details.php">Fashion photography from professional</a></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="display-30"><i class="ti-agenda me-2"></i>05 Lessons</div>
                                        <div class="display-30"><i class="ti-user me-2"></i>40</div>
                                        <div class="display-30"><i class="fas fa-star me-1 display-32 text-warning"></i>4.00(5)</div>
                                    </div>
                                    <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                        <span class="badge-soft secondary">all levels</span>
                                        <h5 class="text-secondary mb-0">$39.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mt-2-6">
                        <div class="card card-style1 p-0 h-100">
                            <div class="card-img rounded-0">
                                <div class="image-hover">
                                    <img class="rounded-top" src="img/content/courses-05.jpg" alt="...">
                                </div>    
                                <a href="courses-list.php" class="course-tag">Music</a>
                                <a href="#!"><i class="far fa-heart"></i></a>
                            </div>
                            <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                                <div class="card-author d-flex">
                                    <div class="avatar">
                                        <img class="rounded-circle" src="img/avatar/avatar-05.jpg" alt="...">
                                    </div>
                                    <h4 class="mb-0 h6">Sherrifah Shahd</h4>
                                </div>
                                <div class="pt-6">
                                    <h3 class="h4 mb-4"><a href="course-details.php">Becoming a DJ? make electronic music</a></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="display-30"><i class="ti-agenda me-2"></i>07 Lessons</div>
                                        <div class="display-30"><i class="ti-user me-2"></i>50</div>
                                        <div class="display-30"><i class="fas fa-star me-1 display-32 text-warning"></i>4.50(7)</div>
                                    </div>
                                    <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                        <span class="badge-soft">beginner</span>
                                        <h5 class="text-primary mb-0">$20.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mt-2-6">
                        <div class="card card-style1 p-0 h-100">
                            <div class="card-img rounded-0 border-color-secondary">
                                <div class="image-hover">
                                    <img class="rounded-top" src="img/content/courses-06.jpg" alt="...">
                                </div>    
                                <a href="courses-list.php" class="course-tag secondary">Finance</a>
                                <a href="#!"><i class="far fa-heart"></i></a>
                            </div>
                            <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                                <div class="card-author d-flex">
                                    <div class="avatar">
                                        <img class="rounded-circle" src="img/avatar/avatar-06.jpg" alt="...">
                                    </div>
                                    <h4 class="mb-0 h6">Blake Nathan</h4>
                                </div>
                                <div class="pt-6">
                                    <h3 class="h4 mb-4"><a href="course-details.php">Financial security thinking & principles</a></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="display-30"><i class="ti-agenda me-2"></i>10 Lessons</div>
                                        <div class="display-30"><i class="ti-user me-2"></i>23</div>
                                        <div class="display-30"><i class="fas fa-star me-1 display-32 text-warning"></i>5.00(1)</div>
                                    </div>
                                    <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                        <span class="badge-soft secondary">expert</span>
                                        <h5 class="text-secondary mb-0">$129.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- start pager  -->
                        <div class="text-center mt-6 mt-lg-7">
                            <div class="pagination text-extra-dark-gray">
                                <ul>
                                    <li><a href="#!" class="me-3"><i class="fas fa-long-arrow-alt-left"></i></a></li>
                                    <li class="active"><a href="#!" class="me-2">1</a></li>
                                    <li><a href="#!" class="me-2">2</a></li>
                                    <li><a href="#!" class="me-3">3</a></li>
                                    <li><a href="#!"><i class="fas fa-long-arrow-alt-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end pager -->
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