<?php
include_once('base.php'); 
?>

<style>
    .amarelocolor{
        color: #FCD600 !important;
    }
    .verdecolor{
        color: #337633 !important;
    }
    .amarelobg{
        background-color: #FCD600 !important;
    }
    .verdebg{
        background-color: #337633 !important;
    }
    .bg-category{
        background-color: #fff;
    }

    /* CARROCEL  */
   .carousel-section {
    background: transparent;
    padding: 30px 0;
    overflow: hidden;
  }

  .carousel-row {
    display: flex;
    width: max-content;
  }

  .carousel-track-right {
    animation: scroll-right 30s linear infinite;
  }

  .carousel-track-left {
    animation: scroll-left 30s linear infinite;
  }

  @keyframes scroll-right {
    0% { transform: translateX(-50%); }
    100% { transform: translateX(0); }
  }

  @keyframes scroll-left {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }

  .carousel-item {
    display: flex;
    align-items: center;
    background: rgb(255, 255, 255);
    /* background-color: rgba(0, 128, 0, 0.6); */
    padding: 15px;
    border-radius: 12px;
    margin: 0 15px;
    min-width: 220px;
    transition: transform 0.3s;
    text-decoration: none;
  }

  .carousel-item:hover {
    transform: scale(1.05);
  }

  .category-img img {
    width: 50px;
    height: 50px;
  }

  .ms-3 {
    margin-left: 15px;
  }

  .h4 {
    font-size: 1.1rem;
    margin: 0;
  }

  .text-white {
    color: white;
  }
</style>

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

        <!-- BANNER
        ================================================== -->
        <section class="top-position1 p-0">
            <div class="container-fluid px-0">
                <div class="slider-fade1 owl-carousel owl-theme w-100">
                    <div class="item bg-img cover-background pt-6 pb-10 pt-sm-6 pb-sm-14 py-md-16 py-lg-20 py-xxl-10 left-overlay-dark" data-overlay-dark="8" data-background="img/banner/bann.png">
                        <div class="container pt-6 pt-md-0">
                            <div class="row align-items-center">
                                <div class="col-md-10 col-lg-8 col-xl-7 mb-1-9 mb-lg-0 py-6 position-relative">
                                    
                                    <h1 class="display-1 font-weight-800 mb-2-6 title fs-1 amarelocolor">Desperte a sua grandeza. Torne-se imparável com a Academy Mon Larama.</h1>
                                    <span class="h5 text-white">Mentorias, formações e treinamentos para quem deseja dominar competências de alto valor, acelerar resultados e conquistar a sua liberdade.</span>
                                    <a href="contact.php" class="butn my-1 mx-1"><i class="bi bi-plus-circle-fill icon-arrow before"></i><span class="label">Saber Mais</span><i class="bi bi-plus-circle-fill icon-arrow after text-white"></i></a>
                                    <a href="courses-grid.php" class="butn white my-1"><i class="bi bi-plus-circle-fill icon-arrow before"></i><span class="label">Nossos Cursos</span><i class="bi bi-plus-circle-fill icon-arrow after"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item bg-img cover-background pt-6 pb-10 pt-sm-6 pb-sm-14 py-md-16 py-lg-20 py-xxl-10 left-overlay-dark" data-overlay-dark="8" data-background="img/banner/slide5.jpg">
                        <div class="container pt-6 pt-md-0">
                            <div class="row align-items-center">
                                <div class="col-md-10 col-lg-8 col-xl-7 mb-1-9 mb-lg-0 py-6 position-relative">
                                    <h2 class="display-1 font-weight-800 mb-2-6 title fs-1 amarelocolor">Está pronto para deixar de ser comum e viver no seu potencial máximo?</h2>
                                    <span class="h5 text-white">Não espere pela próxima oportunidade. Crie-a com o que tem agora.</span><br><br>
                                    <a href="contact.php" class="butn my-1 mx-1"><i class="bi bi-plus-circle-fill icon-arrow before"></i><span class="label">Saber Mais</span><i class="bi bi-plus-circle-fill icon-arrow after text-white"></i></a>
                                    <a href="courses-grid.php" class="butn white my-1"><i class="bi bi-plus-circle-fill icon-arrow before"></i><span class="label">Nossos Cursos</span><i class="bi bi-plus-circle-fill icon-arrow after"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item bg-img cover-background pt-6 pb-10 pt-sm-6 pb-sm-14 py-md-16 py-lg-20 py-xxl-10 left-overlay-dark" data-overlay-dark="8" data-background="img/banner/banner1ac.png">
                        <div class="container pt-6 pt-md-0">
                            <div class="row align-items-center">
                                <div class="col-md-10 col-lg-8 col-xl-7 mb-1-9 mb-lg-0 py-6 position-relative">
                                    <h2 class="display-1 font-weight-800 mb-2-6 title fs-1 amarelocolor">Modelo 70:20:10 aprenda na prática, colabore com outros, e fortaleça sua base teórica.</h2>
                                    <span class="h5 text-white">70% Aprendizado experiencial: no dia a dia de trabalho <br>
                                        20% Aprendizado social: com colegas e mentores <br>
                                        10% Aprendizado formal: cursos e treinamentos</span>
                                    <a href="contact.php" class="butn my-1 mx-1"><i class="bi bi-plus-circle-fill icon-arrow before"></i><span class="label">Saber Mais</span><i class="bi bi-plus-circle-fill icon-arrow after text-white"></i></a>
                                    <a href="courses-grid.php" class="butn white my-1"><i class="bi bi-plus-circle-fill icon-arrow before"></i><span class="label">Nossos Cursos</span><i class="bi bi-plus-circle-fill icon-arrow after"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item bg-img cover-background pt-6 pb-10 pt-sm-6 pb-sm-14 py-md-16 py-lg-20 py-xxl-10 left-overlay-dark" data-overlay-dark="8" data-background="img/banner/slide2.jpg">
                        <div class="container pt-6 pt-md-0">
                            <div class="row align-items-center">
                                <div class="col-md-10 col-lg-8 col-xl-7 mb-1-9 mb-lg-0 py-6 position-relative">
                                    <h2 class="display-1 font-weight-800 mb-2-6 title fs-1 amarelocolor">Formação espacializada para o sector indústria de Gas Natura.</h2>
                                    <span class="h5 text-white">Desenvolva competências técnicas e de gestão com os nossos cursos ministrados por especialistas do sector.
</span><br><br><br>
                                    <a href="contact.php" class="butn my-1 mx-1"><i class="bi bi-plus-circle-fill icon-arrow before"></i><span class="label">Saber Mais</span><i class="bi bi-plus-circle-fill icon-arrow after text-white"></i></a>
                                    <a href="courses-grid.php" class="butn white my-1"><i class="bi bi-plus-circle-fill icon-arrow before"></i><span class="label">Nossos Cursos</span><i class="bi bi-plus-circle-fill icon-arrow after"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="triangle-shape top-15 right-10 z-index-9 d-none d-md-block"></div>
            <div class="square-shape top-25 left-5 z-index-9 d-none d-xl-block"></div>
            <div class="shape-five z-index-9 right-10 bottom-15"></div>
        </section>
        
        <!-- INFORMATION
        ================================================== -->
        <section class="p-0 overflow-visible service-block">
            <div class="container">
                <div class="row mt-n1-9">
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="card card-style3 h-100">
                            <div class="card-body px-1-9 py-2-3">
                                <div class="mb-3 d-flex align-items-center">
                                    <div class="card-icon">
                                        <i class="bi-tools verdecolor"></i>
                                    </div>
                                    <h4 class="ms-4 mb-0">Aprenda na prática</h4>
                                </div>
                                <div>
                                    <p class="mb-3">Ganhe experiência com simulações e treinamentos técnicos aplicados.</p>
                                    <!-- <a href="about.php" class="butn-style1 secondary">View More +</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="card card-style3 h-100">
                            <div class="card-body px-1-9 py-2-3">
                                <div class="mb-3 d-flex align-items-center">
                                    <div class="card-icon">
                                        <i class="bi-person-check verdecolor"></i>
                                    </div>
                                    <h4 class="ms-4 mb-0">Aprenda com especialistas</h4>
                                </div>
                                <div>
                                    <p class="mb-3">Receba formação de profissionais experientes no setor energético.</p>
                                    <!-- <a href="about.php" class="butn-style1 secondary">View More +</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="card card-style3 h-100">
                            <div class="card-body px-1-9 py-2-3">
                                <div class="mb-3 d-flex align-items-center">
                                    <div class="card-icon">
                                        <i class="bi-clock-history verdecolor"></i>
                                    </div>
                                    <h4 class="ms-4 mb-0">Aprenda no seu ritmo</h4>
                                </div>
                                <div>
                                    <p class="mb-3">Tenha acesso a conteúdos flexíveis e adaptados à sua agenda.</p>
                                    <!-- <a href="about.php" class="butn-style1 secondary">View More +</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

         <!-- TRENDING CATEGORIES
        ================================================== -->
        <!-- <section class="bg-img cover-background dark-overlay pt-0 pb-0 mt-5" data-overlay-dark="8" data-background="img/content/bannzdegrad1.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                       
                    </div>
                </div>
               
                <div class="carousel-section">
                     <div class="section-heading text-start mt-5 mb-4">
                            <span class="sub-title text-white fs-6">Categorias</span>
                        </div>
                
                <div class="carousel-row carousel-track-right">
                    
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-01.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Petróleo e Gás</h3></div>
                    </a>
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-02.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Gestão & Finanças</h3></div>
                    </a>
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-03.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Agricultura</h3></div>
                    </a>
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-04.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Minas </h3></div>
                    </a>

                    
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-01.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Línguas</h3></div>
                    </a>
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-02.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Petróleo e Gás</h3></div>
                    </a>
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-03.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Gestão & Finanças</h3></div>
                    </a>
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-04.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Agricultura</h3></div>
                    </a>
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-04.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Minas</h3></div>
                    </a>
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-04.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Línguas</h3></div>
                    </a>
                </div>

                
                <div class="carousel-row carousel-track-left mt-4">
                
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-01.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Petróleo e Gás</h3></div>
                    </a>
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-02.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Gestão & Finanças</h3></div>
                    </a>
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-03.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Agricultura</h3></div>
                    </a>
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-04.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Minas </h3></div>
                    </a>

                   
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-01.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Línguas</h3></div>
                    </a>
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-02.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Petróleo e Gás</h3></div>
                    </a>
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-03.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Gestão & Finanças</h3></div>
                    </a>
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-04.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Agricultura</h3></div>
                    </a>
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-04.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Minas</h3></div>
                    </a>
                    <a href="#" class="carousel-item">
                    <div class="category-img"><img src="img/icons/icon-04.png" alt=""></div>
                    <div class="ms-3"><h3 class="h4 text-secondary">Línguas</h3></div>
                    </a>
                </div>
                </div>
            </div>
        </section> -->

         <!-- CURSOS CERTIFICADOS PELO INEFOP
        ================================================== -->
        <section class="bg-very-light-gray pt-5 pb-0">
            <div class="container">
                <div class="section-heading d-flex justify-content-between align-items-center">
                    <!-- <span class="sub-title">discover new</span> -->
                    <h2 class="h3 mb-0 text-start verdecolor">Nossos Cursos</h2>
                    <a href="courses-grid.php" class="butn white my-1"><i class="bi bi-arrow-right-short icon-arrow before"></i><span class="label">Ver Mais</span><i class="bi bi-arrow-right-short icon-arrow after"></i></a>
                </div>
                <div class="row g-xxl-5 mt-n2-6">
                    <div class="col-md-6 col-xl-3 mt-2-6">
                        <div class="card card-style1 p-0 h-100">
                            <div class="card-img rounded-0">
                                <div class="image-hover">
                                    <img class="rounded-top" src="img/content/curso-industria.jpg" alt="...">
                                </div>
                                <a href="courses-list.php" class="course-tag">Petróleo e Gás</a>
                                <!-- <a href="#!"><i class="bi bi-heart"></i></a> -->
                            </div>
                            <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                                <div class="card-author d-flex">
                                    <div class="avatar">
                                        <img class="rounded-circle" src="img/avatar/user2.jpeg" alt="...">
                                    </div>
                                    <h4 class="mb-0 h6" style="font-size: 10pt;">Eng.º Emanuel Leopoldo</h4><br>
                                </div>
                                <div class="pt-6">
                                    <h3 class="h4 mb-4"><a href="course-IntroGasNatural.php">Indústria de Gás Natural</a></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="display-30"><i class="bi bi-journal-bookmark me-2 text-secondary"></i>10 Lessons</div>
                                        <div class="display-30"><i class="bi bi-person me-2 text-secondary"></i>23</div>
                                        <div class="display-30"><i class="bi bi-star-fill me-1 display-32 text-warning"></i>5.00(1)</div>
                                    </div>
                                    <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                        <span class="badge-soft bg-secondary">Investimento:</span>
                                        <h5 class="text-secondary mb-0 fs-6">kzs 450.000</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mt-2-6">
                        <div class="card card-style1 p-0 h-100">
                            <div class="card-img rounded-0">
                                <div class="image-hover">
                                    <img class="rounded-top" src="img/content/curso-industria.jpg" alt="...">
                                </div>
                                <a href="courses-list.php" class="course-tag">Petróleo e Gás</a>
                                <!-- <a href="#!"><i class="bi bi-heart"></i></a> -->
                            </div>
                            <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                                <div class="card-author d-flex">
                                    <div class="avatar">
                                        <img class="rounded-circle" src="img/avatar/user2.jpeg" alt="...">
                                    </div>
                                    <h4 class="mb-0 h6" style="font-size: 10pt;">Eng.º Emanuel Leopoldo</h4><br>
                                </div>
                                <div class="pt-6">
                                    <h3 class="h4 mb-4"><a href="course-IndustriaPetroleo.php">Introdução à Indústria do Petróleo</a></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="display-30"><i class="bi bi-journal-bookmark me-2 text-secondary"></i>10 Dias</div>
                                        <div class="display-30"><i class="bi bi-person me-2 text-secondary"></i>23</div>
                                        <div class="display-30"><i class="bi bi-star-fill me-1 display-32 text-warning"></i>5.00(1)</div>
                                    </div>
                                    <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                        <span class="badge-soft bg-secondary">Investimento:</span>
                                        <h5 class="text-secondary mb-0 fs-6">kzs 000.000</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mt-2-6">
                        <div class="card card-style1 p-0 h-100">
                            <div class="card-img rounded-0">
                                <div class="image-hover">
                                    <img class="rounded-top" src="img/content/curso-industria.jpg" alt="...">
                                </div>
                                <a href="courses-list.php" class="course-tag">Petróleo e Gás</a>
                                <!-- <a href="#!"><i class="bi bi-heart"></i></a> -->
                            </div>
                            <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                                <div class="card-author d-flex">
                                    <div class="avatar">
                                        <img class="rounded-circle" src="img/avatar/user2.jpeg" alt="...">
                                    </div>
                                    <h4 class="mb-0 h6" style="font-size: 10pt;">Eng.º Emanuel Leopoldo</h4><br>
                                </div>
                                <div class="pt-6">
                                    <h3 class="h4 mb-4"><a href="course-monetizacaoGasNatural.php">Monetização do Gás Natural </a></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="display-30"><i class="bi bi-journal-bookmark me-2 text-secondary"></i>10 Lessons</div>
                                        <div class="display-30"><i class="bi bi-person me-2 text-secondary"></i>23</div>
                                        <div class="display-30"><i class="bi bi-star-fill me-1 display-32 text-warning"></i>5.00(1)</div>
                                    </div>
                                    <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                        <span class="badge-soft bg-secondary">Investimento:</span>
                                        <h5 class="text-secondary mb-0 fs-6">kzs 000.000</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mt-2-6">
                        <div class="card card-style1 p-0 h-100">
                            <div class="card-img rounded-0">
                                <div class="image-hover">
                                    <img class="rounded-top" src="img/content/curso-industria.jpg" alt="...">
                                </div>
                                <a href="courses-list.php" class="course-tag">Gestão & Finanças</a>
                                <!-- <a href="#!"><i class="bi bi-heart"></i></a> -->
                            </div>
                            <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                                <div class="card-author d-flex">
                                    <div class="avatar">
                                        <img class="rounded-circle" src="img/avatar/user2.jpeg" alt="...">
                                    </div>
                                    <h4 class="mb-0 h6" style="font-size: 10pt;">Eng.º Emanuel Leopoldo</h4><br>
                                </div>
                                <div class="pt-6">
                                    <h3 class="h4 mb-4"><a href="course-fundDashboard.php">Fundamentos de Dashboard e Visualização de Dados</a></h3>
                                   <div class="d-flex justify-content-between align-items-center">
                                        <div class="display-30"><i class="bi bi-journal-bookmark me-2 text-secondary"></i>10 Lessons</div>
                                        <div class="display-30"><i class="bi bi-person me-2 text-secondary"></i>23</div>
                                        <div class="display-30"><i class="bi bi-star-fill me-1 display-32 text-warning"></i>5.00(1)</div>
                                    </div>
                                    <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                        <span class="badge-soft bg-secondary">Investimento:</span>
                                        <h5 class="text-secondary mb-0 fs-6">kzs 000.000</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="shape20">
                    <img src="img/bg/bg-02.jpg" alt="...">
                </div>
                <div class="shape18">
                    <img src="img/bg/bg-01.jpg" alt="...">
                </div>
                <div class="shape21">
                    <img src="img/bg/bg-03.jpg" alt="...">
                </div>
            </div>
        </section>

         <!-- CURSOS EM DESENVOLVIMENTO
        ================================================== -->
        <section class="bg-very-light-gray pt-5">
            <div class="container">
                 <div class="section-heading d-flex justify-content-between align-items-center">
                    <!-- <span class="sub-title">discover new</span> -->
                    <h2 class="h3 mb-0 text-start verdecolor">Cursos em desenvolvimento</h2>
                    <a href="courses-grid.php" class="butn white my-1"><i class="bi bi-arrow-right-short icon-arrow before"></i><span class="label">Ver Mais</span><i class="bi bi-arrow-right-short icon-arrow after"></i></a>
                </div>
                <div class="row g-xxl-5 mt-n2-6">
                    <div class="col-md-6 col-xl-3 mt-2-6">
                        <div class="card card-style1 p-0 h-100">
                            <div class="card-img rounded-0">
                                <div class="image-hover">
                                    <img class="rounded-top" src="img/content/curso-industria.jpg" alt="...">
                                </div>
                                <a href="courses-list.php" class="course-tag">Línguas</a>
                                <!-- <a href="#!"><i class="bi bi-heart"></i></a> -->
                            </div>
                            <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                                <div class="card-author d-flex">
                                    <div class="avatar">
                                        <img class="rounded-circle" src="img/avatar/user2.jpeg" alt="...">
                                    </div>
                                    <h4 class="mb-0 h6" style="font-size: 10pt;">Eng.º Emanuel Leopoldo</h4><br>
                                </div>
                                <div class="pt-6">
                                    <h3 class="h4 mb-4"><a href="course-linguaInglesa.php">Língua Inglesa</a></h3>
                                   <div class="d-flex justify-content-between align-items-center">
                                        <div class="display-30"><i class="bi bi-journal-bookmark me-2 text-secondary"></i>10 Lessons</div>
                                        <div class="display-30"><i class="bi bi-person me-2 text-secondary"></i>23</div>
                                        <div class="display-30"><i class="bi bi-star-fill me-1 display-32 text-warning"></i>5.00(1)</div>
                                    </div>
                                    <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                        <span class="badge-soft bg-secondary">Investimento:</span>
                                        <h5 class="text-secondary mb-0 fs-6">kzs 000.000</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mt-2-6">
                        <div class="card card-style1 p-0 h-100">
                            <div class="card-img rounded-0">
                                <div class="image-hover">
                                    <img class="rounded-top" src="img/content/curso-industria.jpg" alt="...">
                                </div>
                                <a href="courses-list.php" class="course-tag">Gestão & Finanças</a>
                                <!-- <a href="#!"><i class="bi bi-heart"></i></a> -->
                            </div>
                            <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                                <div class="card-author d-flex">
                                    <div class="avatar">
                                        <img class="rounded-circle" src="img/avatar/user2.jpeg" alt="...">
                                    </div>
                                    <h4 class="mb-0 h6" style="font-size: 10pt;">Eng.º Emanuel Leopoldo</h4><br>
                                </div>
                                <div class="pt-6">
                                    <h3 class="h4 mb-4"><a href="course-auditoriaFiscalidade.php">Auditoria e Fiscalidade </a></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="display-30"><i class="bi bi-journal-bookmark me-2 text-secondary"></i>10 Lessons</div>
                                        <div class="display-30"><i class="bi bi-person me-2 text-secondary"></i>23</div>
                                        <div class="display-30"><i class="bi bi-star-fill me-1 display-32 text-warning"></i>5.00(1)</div>
                                    </div>
                                    <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                        <span class="badge-soft bg-secondary">Investimento:</span>
                                        <h5 class="text-secondary mb-0 fs-6">kzs 000.000</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mt-2-6">
                        <div class="card card-style1 p-0 h-100">
                            <div class="card-img rounded-0">
                                <div class="image-hover">
                                    <img class="rounded-top" src="img/content/curso-industria.jpg" alt="...">
                                </div>
                                <a href="courses-list.php" class="course-tag">Agricultura</a>
                                <!-- <a href="#!"><i class="bi bi-heart"></i></a> -->
                            </div>
                            <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                                <div class="card-author d-flex">
                                    <div class="avatar">
                                        <img class="rounded-circle" src="img/avatar/user2.jpeg" alt="...">
                                    </div>
                                    <h4 class="mb-0 h6" style="font-size: 10pt;">Eng.º Emanuel Leopoldo</h4><br>
                                </div>
                                <div class="pt-6">
                                    <h3 class="h4 mb-4"><a href="course-beneficiamentoQuimico.php">Beneficiamento Químico de Solos</a></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="display-30"><i class="bi bi-journal-bookmark me-2 text-secondary"></i>10 Lessons</div>
                                        <div class="display-30"><i class="bi bi-person me-2 text-secondary"></i>23</div>
                                        <div class="display-30"><i class="bi bi-star-fill me-1 display-32 text-warning"></i>5.00(1)</div>
                                    </div>
                                    <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                        <span class="badge-soft bg-secondary">Investimento:</span>
                                        <h5 class="text-secondary mb-0 fs-6">kzs 000.000</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mt-2-6">
                        <div class="card card-style1 p-0 h-100">
                            <div class="card-img rounded-0">
                                <div class="image-hover">
                                    <img class="rounded-top" src="img/content/curso-industria.jpg" alt="...">
                                </div>
                                <a href="courses-list.php" class="course-tag">Gestão & Finanças</a>
                                <!-- <a href="#!"><i class="bi bi-heart"></i></a> -->
                            </div>
                            <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                                <div class="card-author d-flex">
                                    <div class="avatar">
                                        <img class="rounded-circle" src="img/avatar/user2.jpeg" alt="...">
                                    </div>
                                    <h4 class="mb-0 h6" style="font-size: 10pt;">Eng.º Emanuel Leopoldo</h4><br>
                                </div>
                                <div class="pt-6">
                                    <h3 class="h4 mb-4"><a href="course-contabilidadePtrolifero.php">Contabilidade para o Sector Petrolífero</a></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="display-30"><i class="bi bi-journal-bookmark me-2 text-secondary"></i>10 Lessons</div>
                                        <div class="display-30"><i class="bi bi-person me-2 text-secondary"></i>23</div>
                                        <div class="display-30"><i class="bi bi-star-fill me-1 display-32 text-warning"></i>5.00(1)</div>
                                    </div>
                                    <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                        <span class="badge-soft bg-secondary">Investimento:</span>
                                        <h5 class="text-secondary mb-0 fs-6">kzs 000.000</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="shape20">
                    <img src="img/bg/bg-02.jpg" alt="...">
                </div>
                <div class="shape18">
                    <img src="img/bg/bg-01.jpg" alt="...">
                </div>
                <div class="shape21">
                    <img src="img/bg/bg-03.jpg" alt="...">
                </div>
            </div>
        </section>

          <!-- REGISTER
        ================================================== -->
        <section class="bg-img cover-background dark-overlay1 parallax md pt-3 pb-3" data-overlay-dark="8" data-background="img/content/imagem.png">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 mb-1-9 mb-lg-0">
                        <div class="section-heading text-start">
                            <span class="sub-title white">Nossa Missão</span>
                            <h2 class="h3 text-white">No que acreditamos</h2>
                            <p class="text-white">Criar soluções para as actividades de formação integrada de forma planificada e sistémica, tendo intervenção nas componentes de formação inter-empresa e intra-empresa, ou seja, formação dirigida ao público em geral e formação à medida dirigida as empresas.</p>
                        </div>
                        <div class="row mb-5">
                            <div class="col-sm-4 mb-1-9 mb-sm-0">
                                <i class="bi bi-journal-bookmark text-primary display-16 mb-3 d-block"></i>
                                <h4 class="mb-2 text-white h2"><span class="countup">78</span>+</h4>
                                <p class="mb-0 font-weight-600 text-white">Cursos</p>
                            </div>
                            <div class="col-sm-4 mb-1-9 mb-sm-0">
                                <i class="bi-person-badge text-primary display-16 mb-3 d-block"></i>
                                <h4 class="mb-2 text-white h2"><span class="countup">400</span>k</h4>
                                <p class="mb-0 font-weight-600 text-white">Professores</p>
                            </div>
                            <div class="col-sm-4">
                                <i class="bi-mortarboard text-primary display-16 mb-3 d-block"></i>
                                <h4 class="mb-2 text-white h3"><span class="countup">1200</span>+</h4>
                                <p class="mb-0 font-weight-600 text-white">Alunos</p>
                            </div>
                        </div>
                        <!-- <a href="contact.php" class="butn"><i class="fas fa-plus-circle icon-arrow before"></i><span class="label">Apply Now</span><i class="fas fa-plus-circle icon-arrow after"></i></a> -->
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="card border-radius-5 border-0">
                            <div class="card-header bg-primary text-center py-4">
                                <h3 class="mb-0 text-secondary">Solicitar Informação</h3>
                            </div>
                            <div class="card-body p-1-9">
                                <form class="contact quform" action="" method="post" enctype="multipart/form-data">
        <div class="quform-elements">
            <div class="row">
                <div class="col-md-6">
                    <div class="quform-element form-group">
                        <div class="quform-input">
                            <input class="form-control" id="name" type="text" name="name" placeholder="Nome Completo*" required />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="quform-element form-group">
                        <div class="quform-input">
                            <input class="form-control" id="email" type="email" name="email" placeholder="Email*" required />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="quform-element form-group">
                        <div class="quform-input">
                            <input class="form-control" id="contact" type="text" name="contact" placeholder="Contacto*" required />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="quform-element form-group">
                        <div class="quform-input">
                            <input class="form-control" id="course" type="text" name="course" placeholder="Curso" />
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="quform-element form-group">
                        <div class="quform-input">
                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Mensagem*" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="quform-submit-inner">
                        <button class="butn secondary amarelocolor quform-submit-button" type="submit">
                            <i class="bi bi-send icon-arrow before text-primary"></i>
                            <span class="label">Enviar</span>
                            <i class="bi bi-send icon-arrow after"></i>
                        </button>
                    </div>
                    <div class="quform-loading-wrap text-start"><span class="quform-loading"></span></div>
                </div>
            </div>
        </div>
    </form> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shape20">
                    <img src="img/bg/bg-02.jpg" alt="...">
                </div>
                <div class="shape18">
                    <img src="img/bg/bg-01.jpg" alt="...">
                </div>
                <!-- <div class="shape21">
                    <img src="img/bg/bg-03.jpg" alt="...">
                </div> -->
            </div>
        </section>

        <!-- PARTNER
        ================================================== -->
        <!-- <section class="bg-very-light-gray py-8">
            <div class="container">
                <div class="client-carousel owl-carousel owl-theme">
                    <div class="text-center">
                        <img src="img/logos/logo-mon1.png" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="img/logos/monlarama-logo-png-2.png" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="img/logos/egate.png" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="img/logos/logo-mon1.png" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="img/logos/monlarama-logo-png-2.png" alt="...">
                    </div>
                     <div class="text-center">
                        <img src="img/logos/egate.png" alt="...">
                    </div>
                </div>
            </div>
        </section> -->

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
    <!-- <script src="quform/js/scripts.js"></script> -->

    <!-- all js include end -->

     <script>
        $(document).ready(function() {
            console.log('jQuery loaded:', !!$.fn.jquery);
            console.log('Quform plugin available:', !!$.fn.Quform);
            try {
                $('.quform').Quform({
                    container: '.quform-elements',
                    loading: '.quform-loading-wrap',
                    submitButton: '.quform-submit-button',
                    errorTitle: 'Form Submission Error',
                    errorResponseEmpty: 'The server response was empty.',
                    errorAjax: 'An error occurred during the AJAX request.',
                    success: function(response) {
                        console.log('Form submission success:', response);
                        this.reset(true);
                        var $successMessage = $('<div class="quform-success-message"/>')
                            .html('Thank you for your submission!')
                            .hide()
                            .insertBefore(this.$container)
                            .fadeIn('slow');
                        this.scrollTo($successMessage);
                        setTimeout(function() {
                            $successMessage.fadeOut('slow', function() {
                                $successMessage.remove();
                            });
                        }, 8000);
                    },
                    error: function(response) {
                        console.log('Form submission error:', response);
                    }
                });
            } catch (e) {
                console.error('Quform initialization error:', e);
            }
        });
    </script>
    
</body>

</html>