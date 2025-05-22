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

        <!-- Blog Left Sidebar
        ================================================== -->
        <section class="blog">
            <div class="container">
                <div class="row mt-n2-9">
                    <div class="col-lg-4 mt-2-9 order-2 order-lg-1">
                        <div class="pe-lg-1-6 pe-xl-1-9">
                            <div class="sidebar">
                                <div class="widget">
                                    <div class="widget-title">
                                        <h3>Search</h3>
                                    </div>
                                    <form class="search">
                                        <input type="text" placeholder="Search Your Courses">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="widget">
                                    <div class="widget-title">
                                        <h3>Course Categories</h3>
                                    </div>
                                    <ul class="category-list">
                                        <li><a href="#!">Java Programming<span>10</span></a></li>
                                        <li><a href="#!">Business Management<span>05</span></a></li>
                                        <li><a href="#!">Online Learning<span>15</span></a></li>
                                        <li><a href="#!">Web Designing<span>20</span></a></li>
                                        <li><a href="#!">English Learning<span>25</span></a></li>
                                        <li><a href="#!">Animation<span>40</span></a></li>
                                    </ul>
                                </div>
                                <div class="widget">
                                    <div class="widget-title">
                                        <h3>Recent Articles</h3>
                                    </div>
                                    <div class="media mb-1-6">
                                        <img class="pe-3 border-radius-5" src="img/content/course-list-insta-01.jpg" alt="...">
                                        <div class="media-body align-self-center">
                                            <h4 class="display-30 display-sm-29 font-weight-700 mb-1 text-capitalize"><a href="#!">Learn English Easily Programs</a></h4>
                                            <span class="font-weight-700 display-30 display-md-29">Price: <span class="font-weight-800 display-30 display-md-29">$350</span></span>
                                        </div>
                                    </div>
                                    <div class="media mb-1-6">
                                        <img class="pe-3 border-radius-5" src="img/content/course-list-insta-02.jpg" alt="...">
                                        <div class="media-body align-self-center">
                                            <h4 class="display-30 display-sm-29 font-weight-700 mb-1 text-capitalize"><a href="#!">Unleash Power Of Animations</a></h4>
                                            <span class="font-weight-700 display-30 display-md-29">Price: <span class="font-weight-800 display-30 display-md-29">$350</span></span>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <img class="pe-3 border-radius-5" src="img/content/course-list-insta-01.jpg" alt="...">
                                        <div class="media-body align-self-center">
                                            <h4 class="display-30 display-sm-29 font-weight-700 mb-1 text-capitalize"><a href="#!">Healthy Code Review Mindset</a></h4>
                                            <span class="font-weight-700 display-30 display-md-29">Price: <span class="font-weight-800 display-30 display-md-29">$350</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget">
                                    <div class="widget-title">
                                        <h3>Popular Tags</h3>
                                    </div>
                                    <ul class="course-tags">
                                        <li><a href="#!">Business</a></li>
                                        <li><a href="#!">Courses</a></li>
                                        <li><a href="#!">Guides</a></li>
                                        <li><a href="#!">Tips</a></li>
                                        <li><a href="#!">Education</a></li>
                                        <li><a href="#!">Marketing</a></li>
                                        <li><a href="#!">Technology</a></li>
                                    </ul>
                                </div>
                                <div class="widget">
                                    <div class="widget-title">
                                        <h3>Share</h3>
                                    </div>
                                    <ul class="social-icons mb-0 ps-0">
                                        <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-8 mt-2-9 order-1 order-lg-2">
                        <div class="row mt-n2-6">
                            <div class="col-md-6 mt-2-6">
                                <article class="blog-style1 position-relative d-block mb-0">
                                    <div class="img-holder position-relative d-block">
                                        <div class="image-hover">
                                            <img src="img/blog/blog-01.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="text-holder">
                                        <div class="category-box">
                                            <a href="#!">creative</a>
                                        </div>
                                        <h3 class="display-25 font-weight-700 mb-3"><a href="blog-details.php">Skills that you can learn from eLearn.</a></h3>
                                        <div><p>Duty obligations of business frequently occur pleasures enjoy...</p></div>
                                        <div class="bottom-box">
                                            <div class="btn-box">
                                                <a href="blog-details.php">
                                                    <span class="icon-right-arrow-1"></span>Read More
                                                </a>
                                            </div>
                                            <ul class="mb-0 ps-0">
                                                <li><span class="icon-calendar"></span>6 Jul 2023</li>
                                            </ul>
                                        </div>
                                    </div>
                                </article>                        
                            </div>
                            <div class="col-md-6 mt-2-6">
                                <article class="blog-style1 position-relative d-block mb-0">
                                    <div class="img-holder position-relative d-block">
                                        <div class="image-hover">
                                            <img src="img/blog/blog-02.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="text-holder">
                                        <div class="category-box">
                                            <a href="#!">Learning</a>
                                        </div>
                                        <h3 class="display-25 font-weight-700 mb-3"><a href="blog-details.php">Is eLearn any good? 7 ways you can be certain.</a></h3>
                                        <div><p>Duty obligations of business frequently occur pleasures enjoy...</p></div>
                                        <div class="bottom-box">
                                            <div class="btn-box">
                                                <a href="blog-details.php">
                                                    <span class="icon-right-arrow-1"></span>Read More
                                                </a>
                                            </div>
                                            <ul class="mb-0 ps-0">
                                                <li><span class="icon-calendar"></span>4 Jul 2023</li>
                                            </ul>
                                        </div>
                                    </div>
                                </article>                        
                            </div>
                            <div class="col-md-6 mt-2-6">
                                <article class="blog-style1 position-relative d-block mb-0">
                                    <div class="img-holder position-relative d-block">
                                        <div class="image-hover">
                                            <img src="img/blog/blog-03.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="text-holder">
                                        <div class="category-box">
                                            <a href="#!">Career</a>
                                        </div>
                                        <h3 class="display-25 font-weight-700 mb-3"><a href="blog-details.php">How will eLearn be in the future.</a></h3>
                                        <div><p>Duty obligations of business frequently occur pleasures enjoy...</p></div>
                                        <div class="bottom-box">
                                            <div class="btn-box">
                                                <a href="blog-details.php">
                                                    <span class="icon-right-arrow-1"></span>Read More
                                                </a>
                                            </div>
                                            <ul class="mb-0 ps-0">
                                                <li><span class="icon-calendar"></span>4 Jul 2023</li>
                                            </ul>
                                        </div>
                                    </div>
                                </article>                        
                            </div>
                            <div class="col-md-6 mt-2-6">
                                <article class="blog-style1 position-relative d-block mb-0">
                                    <div class="img-holder position-relative d-block">
                                        <div class="image-hover">
                                            <img src="img/blog/blog-04.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="text-holder">
                                        <div class="category-box">
                                            <a href="#!">Teacher</a>
                                        </div>
                                        <h3 class="display-25 font-weight-700 mb-3"><a href="blog-details.php">How eLearn Can Help You Improve Your Health.</a></h3>
                                        <div><p>Duty obligations of business frequently occur pleasures enjoy...</p></div>
                                        <div class="bottom-box">
                                            <div class="btn-box">
                                                <a href="blog-details.php">
                                                    <span class="icon-right-arrow-1"></span>Read More
                                                </a>
                                            </div>
                                            <ul class="mb-0 ps-0">
                                                <li><span class="icon-calendar"></span>30 Jun 2023</li>
                                            </ul>
                                        </div>
                                    </div>
                                </article>                        
                            </div>
                            <div class="col-md-6 mt-2-6">
                                <article class="blog-style1 position-relative d-block mb-0">
                                    <div class="img-holder position-relative d-block">
                                        <div class="image-hover">
                                            <img src="img/blog/blog-05.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="text-holder">
                                        <div class="category-box">
                                            <a href="#!">Awards</a>
                                        </div>
                                        <h3 class="display-25 font-weight-700 mb-3"><a href="blog-details.php">Why eLearn Had Been So Popular Till Now?</a></h3>
                                        <div><p>Duty obligations of business frequently occur pleasures enjoy...</p></div>
                                        <div class="bottom-box">
                                            <div class="btn-box">
                                                <a href="blog-details.php">
                                                    <span class="icon-right-arrow-1"></span>Read More
                                                </a>
                                            </div>
                                            <ul class="mb-0 ps-0">
                                                <li><span class="icon-calendar"></span>30 Jun 2023</li>
                                            </ul>
                                        </div>
                                    </div>
                                </article>                        
                            </div>
                            <div class="col-md-6 mt-2-6">
                                <article class="blog-style1 position-relative d-block mb-0">
                                    <div class="img-holder position-relative d-block">
                                        <div class="image-hover">
                                            <img src="img/blog/blog-06.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="text-holder">
                                        <div class="category-box">
                                            <a href="#!">Skill Development</a>
                                        </div>
                                        <h3 class="display-25 font-weight-700 mb-3"><a href="blog-details.php">Ten eLearn Tips You Need To Learn Now.</a></h3>
                                        <div><p>Duty obligations of business frequently occur pleasures enjoy...</p></div>
                                        <div class="bottom-box">
                                            <div class="btn-box">
                                                <a href="blog-details.php">
                                                    <span class="icon-right-arrow-1"></span>Read More
                                                </a>
                                            </div>
                                            <ul class="mb-0 ps-0">
                                                <li><span class="icon-calendar"></span>26 Jun 2023</li>
                                            </ul>
                                        </div>
                                    </div>
                                </article>                        
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