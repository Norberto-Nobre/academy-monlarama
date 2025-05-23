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
        <section class="bg-img cover-background dark-overlay pt-0 pb-0 mt-5" data-overlay-dark="8" data-background="img/content/bannzdegrad1.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                       
                    </div>
                </div>
                <!-- HTML do carrossel -->
                <div class="carousel-section">
                     <div class="section-heading text-start mt-5 mb-4">
                            <span class="sub-title text-white fs-6">Categorias</span>
                            <!-- <h2 class="h1 mb-0">Categorias populares</h2> -->
                        </div>
                <!-- Linha 1: desliza para a direita -->
                <div class="carousel-row carousel-track-right">
                    <!-- Repetir os 4 itens duas vezes para looping -->
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

                    <!-- Repetição -->
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

                <!-- Linha 2: desliza para a esquerda -->
                <div class="carousel-row carousel-track-left mt-4">
                    <!-- Repetir os 4 itens duas vezes para looping -->
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

                    <!-- Repetição -->
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
        </section>

         <!-- CURSOS CERTIFICADOS PELO INEFOP
        ================================================== -->
        <section class="bg-very-light-gray pt-5 pb-0">
            <div class="container">
                <div class="section-heading d-flex justify-content-between align-items-center">
                    <!-- <span class="sub-title">discover new</span> -->
                    <h2 class="h3 mb-0 text-start verdecolor">Cursos certificados pelo Inefop</h2>
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
                                        <img class="rounded-circle" src="img/avatar/avatar-01.jpg" alt="...">
                                    </div>
                                    <h4 class="mb-0 h6" style="font-size: 10pt;">Eng.º Emanuel Leopoldo</h4><br>
                                </div>
                                <div class="pt-6">
                                    <h3 class="h4 mb-4"><a href="course-details.php">Indústria de Gás Natural</a></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="display-30"><i class="bi bi-journal-bookmark me-2 text-secondary"></i>10 Lessons</div>
                                        <div class="display-30"><i class="bi bi-person me-2 text-secondary"></i>23</div>
                                        <div class="display-30"><i class="bi bi-star-fill me-1 display-32 text-warning"></i>5.00(1)</div>
                                    </div>
                                    <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                        <span class="badge-soft bg-secondary">Investimento:</span>
                                        <h5 class="text-secondary mb-0 fs-6">450.000 kzs</h5>
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
                                        <img class="rounded-circle" src="img/avatar/avatar-01.jpg" alt="...">
                                    </div>
                                    <h4 class="mb-0 h6" style="font-size: 10pt;">Eng.º Emanuel Leopoldo</h4><br>
                                </div>
                                <div class="pt-6">
                                    <h3 class="h4 mb-4"><a href="course-IndustriaPetroleo.php">Introdução à Indústria do Petróleo</a></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="display-30"><i class="bi bi-journal-bookmark me-2 text-secondary"></i>10 Lessons</div>
                                        <div class="display-30"><i class="bi bi-person me-2 text-secondary"></i>23</div>
                                        <div class="display-30"><i class="bi bi-star-fill me-1 display-32 text-warning"></i>5.00(1)</div>
                                    </div>
                                    <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                        <span class="badge-soft bg-secondary">Investimento:</span>
                                        <h5 class="text-secondary mb-0 fs-6">$55.00</h5>
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
                                        <img class="rounded-circle" src="img/avatar/avatar-01.jpg" alt="...">
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
                                        <h5 class="text-secondary mb-0 fs-6">$55.00</h5>
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
                                        <img class="rounded-circle" src="img/avatar/avatar-01.jpg" alt="...">
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
                                        <h5 class="text-secondary mb-0 fs-6">$55.00</h5>
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
                                        <img class="rounded-circle" src="img/avatar/avatar-01.jpg" alt="...">
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
                                        <h5 class="text-secondary mb-0 fs-6">000.000 kzs</h5>
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
                                        <img class="rounded-circle" src="img/avatar/avatar-01.jpg" alt="...">
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
                                        <h5 class="text-secondary mb-0 fs-6">$55.00</h5>
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
                                        <img class="rounded-circle" src="img/avatar/avatar-01.jpg" alt="...">
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
                                        <h5 class="text-secondary mb-0 fs-6">$55.00</h5>
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
                                        <img class="rounded-circle" src="img/avatar/avatar-01.jpg" alt="...">
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
                                        <h5 class="text-secondary mb-0 fs-6">$55.00</h5>
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
                            <h2 class="h1 text-white">No que acreditamos</h2>
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
                                <h3 class="mb-0 text-secondary">Aplicar Agora</h3>
                            </div>
                            <div class="card-body p-1-9">
                                <form class="contact quform" action="quform/contact.php" method="post" enctype="multipart/form-data" onclick="">
                                    <div class="quform-elements">
                                        <div class="row">

                                            <!-- Begin Text input element -->
                                            <div class="col-md-6">
                                                <div class="quform-element form-group">
                                                    <div class="quform-input">
                                                        <input class="form-control" id="name" type="text" name="name" placeholder="Nome Completo*" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Text input element -->

                                            <!-- Begin Text input element -->
                                            <div class="col-md-6">
                                                <div class="quform-element form-group">
                                                    <div class="quform-input">
                                                        <input class="form-control" id="email" type="email" name="email" placeholder="Email*" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Text input element -->

                                            <!-- Begin Text input element -->
                                            <div class="col-md-6">
                                                <div class="quform-element form-group">
                                                    <div class="quform-input">
                                                        <input class="form-control" id="contact" type="text" name="contact" placeholder="Contacto*" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Text input element -->

                                            <!-- Begin Text input element -->
                                            <div class="col-md-6">
                                                <div class="quform-element form-group">
                                                    <div class="quform-input">
                                                        <input class="form-control" id="course" type="text" name="course" placeholder="Curso" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Text input element -->

                                            <!-- Begin Textarea element -->
                                            <div class="col-md-12">
                                                <div class="quform-element form-group">
                                                    <div class="quform-input">
                                                        <textarea class="form-control" id="message" name="message" rows="3" placeholder="Mensagem*"></textarea>
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
                                                    <button class="butn secondary amarelocolor" type="submit"><i class="bi bi-send icon-arrow before amarelocolor"></i><span class="label">Enviar</span><i class="bi bi-send icon-arrow after"></i></button>
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

        <!-- ABOUTUS
        ================================================== -->
        <!-- <section class="aboutus-style-01 position-relative">
            <div class="container pt-lg-4">
                <div class="row align-items-center mt-n1-9">
                    <div class="col-md-12 col-lg-6 mt-1-9 order-2 order-lg-1">
                        <div class="position-relative">
                            <div class="position-relative">
                                <div class="image-hover">
                                    <img src="img/content/about-03.jpg" alt="..." class="ps-sm-10 position-relative z-index-1">
                                </div>
                                <img src="img/content/about-02.jpg" alt="..." class="img-2 d-none d-xl-block">
                                <img src="img/bg/bg-07.png" class="bg-shape1 d-none d-sm-block" alt="...">
                            </div>
                            <div class="d-none d-sm-block">
                                <div class="about-text">
                                    <div class="about-counter">
                                        <span class="countup">9</span> +
                                    </div>
                                    <p>YEARS EXPERIENCE JUST ACHIVED</p>
                                </div>
                            </div>
                        </div>   
                    </div>
                    <div class="col-md-12 col-lg-6 mt-1-9 order-2 order-lg-1">
                        <div class="section-heading text-start mb-2">
                            <span class="sub-title">welcome!</span>
                        </div>
                        <h2 class="font-weight-800 h1 mb-1-9 text-primary">Learn whenever, anyplace, at your own speed.</h2>
                        <p class="about-border lead fst-italic mb-1-9">A spot to furnish understudies with sufficient information and abilities in an unpredictable world.</p>
                        <blockquote>
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
                        </blockquote>
                        <div class="dotted-seprator pt-1-9 mt-1-9"></div>
                        <div class="row">
                            <div class="col-sm-6 col-12 mb-3 mb-sm-0">
                                <div class="media">
                                    <i class="ti-mobile display-15 text-secondary"></i>
                                    <div class="media-body align-self-center ms-3">
                                        <h4 class="mb-1 h5">Phone Number</h4>
                                        <p class="mb-0">(123)-456-789</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="media">
                                    <i class="ti-email display-15 text-secondary"></i>
                                    <div class="media-body align-self-center ms-3">
                                        <h4 class="mb-1 h5">Email Address</h4>
                                        <p class="mb-0">Info@mail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shape18">
                    <img src="img/bg/bg-01.jpg" alt="...">
                </div>
                <div class="shape20">
                    <img src="img/bg/bg-02.jpg" alt="...">
                </div>
            </div>
        </section> -->

        <!-- ONLINE INSTRUCTORS
        ================================================== -->
        <!-- <section class="bg-very-light-gray position-relative">
            <div class="container">
                <div class="section-heading">
                    <span class="sub-title">Instructors</span>
                    <h2 class="h1 mb-0">Experience Instructors</h2>
                </div>
                <div class="row position-relative mt-n1-9">
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="team-style1 text-center">
                            <img src="img/team/team-01.jpg" class="border-radius-5" alt="...">
                            <div class="team-info">
                                <h3 class="text-primary mb-1 h4">Murilo Souza</h3>
                                <span class="font-weight-600 text-secondary">Web Designer</span>
                            </div>
                            <div class="team-overlay">
                                <div class="d-table h-100 w-100">
                                    <div class="d-table-cell align-middle">
                                        <h3><a href="#" class="text-white">About Murilo Souza</a></h3>
                                        <p class="text-white mb-0">I preserve each companion certification and I'm an authorized AWS solutions architect professional.</p>
                                        <ul class="social-icon-style1">
                                            <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-youtube"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="team-style1 text-center">
                            <img src="img/team/team-02.jpg" class="border-radius-5" alt="...">
                            <div class="team-info">
                                <h3 class="text-primary mb-1 h4">Balsam Samira</h3>
                                <span class="font-weight-600 text-secondary">Photographer</span>
                            </div>
                            <div class="team-overlay">
                                <div class="d-table h-100 w-100">
                                    <div class="d-table-cell align-middle">
                                        <h3><a href="#" class="text-white">About Balsam Samira</a></h3>
                                        <p class="text-white mb-0">I preserve each companion certification and I'm an authorized AWS solutions architect professional.</p>
                                        <ul class="social-icon-style1">
                                            <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-youtube"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="team-style1 text-center">
                            <img src="img/team/team-03.jpg" class="border-radius-5" alt="...">
                            <div class="team-info">
                                <h3 class="text-primary mb-1 h4">Rodrigo Ribeiro</h3>
                                <span class="font-weight-600 text-secondary">Psychologist</span>
                            </div>
                            <div class="team-overlay">
                                <div class="d-table h-100 w-100">
                                    <div class="d-table-cell align-middle">
                                        <h3><a href="#" class="text-white">About Rodrigo Ribeiro</a></h3>
                                        <p class="text-white mb-0">I preserve each companion certification and I'm an authorized AWS solutions architect professional.</p>
                                        <ul class="social-icon-style1">
                                            <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-youtube"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="team-bg-shape d-none d-xl-block">
                        <img src="img/bg/bg-07.png" alt="...">
                    </div>
                </div>
                <div class="shape18">
                    <img src="img/bg/bg-01.jpg" alt="...">
                </div>
                <div class="shape20">
                    <img src="img/bg/bg-02.jpg" alt="...">
                </div>
                <div class="shape21">
                    <img src="img/bg/bg-03.jpg" alt="...">
                </div>
            </div>
        </section> -->

        <!-- WHY CHOOSE US
        ================================================== -->
        <!-- <section>
            <div class="container">
                <div class="row align-items-center mt-n1-9">
                    <div class="col-lg-6 mt-1-9">
                        <div class="why-choose-img position-relative">
                            <img class="border-radius-5" src="img/content/why-choose-img.jpg" alt="...">
                            <div class="position-absolute top-50 start-50 translate-middle story-video">
                                <a class="video video_btn" href="https://www.youtube.com/watch?v=ZPs3URGs0KQ"><i class="fas fa-play font-size22"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-1-9">
                    <div class="why-choose-content">
                        <div class="mb-1-9">
                            <h2 class="h1 mb-2 text-primary">Our Facilities</h2>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisic sed eius to mod tempor incididunt.</p>
                        </div>
                        <div class="media">
                            <i class="ti-panel display-15 text-secondary"></i>
                            <div class="media-body ps-3">
                                    <h4 class="h5 font-weight-700 mb-1 mb-md-2">Self Registration</h4>
                                    <p class="mb-0 w-lg-90">
                                        A getting to know gadgets based totally on formalised coaching however with the assist of digital resources.
                                    </p>
                                </div>
                        </div>
                        <div class="dotted-seprator pt-1-9 mt-1-9"></div>
                        <div class="media">
                            <i class="ti-package display-15 text-secondary"></i>
                            <div class="media-body ps-3">
                                    <h4 class="h5 font-weight-700 mb-1 mb-md-2">Accreditation Support</h4>
                                    <p class="mb-0 w-lg-90">
                                        A getting to know gadgets based totally on formalised coaching however with the assist of digital resources.
                                    </p>
                                </div>
                        </div>
                        <div class="dotted-seprator pt-1-9 mt-1-9"></div>
                        <div class="media">
                            <i class="ti-bookmark-alt display-15 text-secondary"></i>
                            <div class="media-body ps-3">
                                    <h4 class="h5 font-weight-700 mb-1 mb-md-2">Brand Integration</h4>
                                    <p class="mb-0 w-lg-90">
                                        A getting to know gadgets based totally on formalised coaching however with the assist of digital resources.
                                    </p>
                                </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section> -->

        <!-- COUNTER
        ================================================== -->
        <!-- <section class="pt-0">
            <div class="container">
                <div class="row mt-n1-9">
                    <div class="col-sm-6 col-lg-3 mt-1-9">
                        <div class="counter-wrapper">
                            <div class="counter-icon">
                                <div class="d-table-cell align-middle">
                                    <img src="img/icons/icon-01.png" class="w-55px" alt="...">
                                </div>
                            </div>
                            <div class="counter-content">
                                <h4 class="counter-number">
                                    <span class="countup">78</span>+
                                </h4>
                                <p class="mb-0 font-weight-600">Classess Complete</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-1-9">
                        <div class="counter-wrapper">
                            <div class="counter-icon">
                                <div class="d-table-cell align-middle">
                                    <img src="img/icons/icon-02.png" class="w-55px" alt="...">
                                </div>
                            </div>
                            <div class="counter-content">
                                <h4 class="counter-number">
                                    <span class="countup">20</span>k
                                </h4>
                                <p class="mb-0 font-weight-600">Total Students</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-1-9">
                        <div class="counter-wrapper">
                            <div class="counter-icon">
                                <div class="d-table-cell align-middle">
                                    <img src="img/icons/icon-03.png" class="w-55px" alt="...">
                                </div>
                            </div>
                            <div class="counter-content">
                                <h4 class="counter-number">
                                    <span class="countup">400</span>k
                                </h4>
                                <p class="mb-0 font-weight-600">Libary Books</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-1-9">
                        <div class="counter-wrapper">
                            <div class="counter-icon">
                                <div class="d-table-cell align-middle">
                                    <img src="img/icons/icon-04.png" class="w-55px" alt="...">
                                </div>
                            </div>
                            <div class="counter-content">
                                <h4 class="counter-number">
                                    <span class="countup">1200</span>+
                                </h4>
                                <p class="mb-0 font-weight-600">Certified Teachers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- TESTIMONIAL
        ================================================== -->
        <!-- <section class="bg-light">
            <div class="container">
                <div class="section-heading">
                    <span class="sub-title">testimonial</span>
                    <h2 class="h1 mb-0">What Educators Say About Us!</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8 position-relative">
                        <div class="testimonial-carousel text-center owl-carousel owl-theme">
                            <div>
                                <p class="mb-1-9 mb-lg-6 lead">Loan was worth a fortune to my company. I didn't even need training. I am really satisfied with my loan. Loan has got everything I need. We've used loan for the last five years.</p>
                                <h6 class="mb-0 h5">Callum Lissa <small class="text-primary"> - Founder</small></h6>
                            </div>
                            <div>
                                <p class="mb-1-9 mb-lg-6 lead">Loan is the next killer app. We can't understand how we've been living without loan. It's exactly what I've been looking for. Wow what great service, I love it! Buy this now. Loan is both attractive and highly adaptable.</p>
                                <h6 class="mb-0 h5">Bethany Nichols <small class="text-primary"> - General Manager</small></h6>
                            </div>
                            <div>
                                <p class="mb-1-9 mb-lg-6 lead">Thank you so much for your help. Loan saved my business. Without loan, we would have gone bankrupt by now. Loan is worth much more than I paid. I can't say enough about loan. The very best. I have gotten at least 50 times the value from loan.</p>
                                <h6 class="mb-0 h5">Lily Hogben <small class="text-primary"> - CEO</small></h6>
                            </div>
                        </div>
                        <h6 class="testimonial-quote">“</h6>
                    </div>
                </div>
            </div>
            <div>
                <img src="img/avatar/avatar-01.jpg" class="position-absolute bottom-15 left-20 d-none d-lg-block rounded-circle w-40px" alt="...">
                <img src="img/avatar/avatar-02.jpg" class="position-absolute bottom-40 left-10 d-none d-lg-block rounded-circle" alt="...">
                <img src="img/avatar/avatar-03.jpg" class="position-absolute left-20 top-20 d-none d-lg-block rounded-circle w-60px" alt="...">
                <img src="img/avatar/avatar-04.jpg" class="position-absolute top-45 right-10 d-none d-lg-block rounded-circle" alt="...">
                <img src="img/avatar/avatar-05.jpg" class="position-absolute top-25 right-20 d-none d-lg-block rounded-circle w-40px" alt="...">
                <img src="img/avatar/avatar-06.jpg" class="position-absolute bottom-15 right-15 d-none d-lg-block rounded-circle" alt="...">
            </div>
            <div class="shape21">
                <img src="img/bg/bg-03.jpg" alt="...">
            </div>
            <span class="process-left-shape d-none d-sm-block"></span>
        </section> -->

        <!-- PROCESS
        ================================================== -->
        <!-- <section>
            <div class="container">
                <div class="section-heading">
                    <span class="sub-title">process</span>
                    <h2 class="h1 mb-0">How It Works?</h2>
                </div>
                <div class="row">
                    <div class="process-wrapper">
                        <div class="process-background"></div>
                        <div class="process-content-wrapper">
                            <div class="row mt-n1-9">
                                <div class="col-lg-3 mt-1-9">
                                    <div class="process-content">
                                        <div class="mb-1-6 mb-lg-1-9">
                                            <img src="img/content/process-01.png" alt="...">
                                        </div>
                                        <h3 class="h4">Students</h3>
                                        <p class="mb-0">Use of technology to empower individuals adapt anyplace and whenever.</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 mt-1-9">
                                    <div class="process-content">
                                        <div class="mb-1-6 mb-lg-1-9">
                                            <img src="img/content/process-02.png" alt="...">
                                        </div>
                                        <h3 class="h4">Teachers</h3>
                                        <p class="mb-0">Use of technology to empower individuals adapt anyplace and whenever.</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 mt-1-9">
                                    <div class="process-content">
                                        <div class="mb-1-6 mb-lg-1-9">
                                            <img src="img/content/process-03.png" alt="...">
                                        </div>
                                        <h3 class="h4">Helpful Staff</h3>
                                        <p class="mb-0">Use of technology to empower individuals adapt anyplace and whenever.</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 mt-1-9">
                                    <div class="process-content">
                                        <div class="mb-1-6 mb-lg-1-9">
                                            <img src="img/content/process-04.png" alt="...">
                                        </div>
                                        <h3 class="h4">Academic Staff</h3>
                                        <p class="mb-0">Use of technology to empower individuals adapt anyplace and whenever.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- UPCOMING EVENT
        ================================================== -->
        <!-- <section class="bg-very-light-gray">
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
        </section> -->

        <!-- BLOG
        ================================================== -->
        <!-- <section class="position-relative">
            <div class="container">
                <div class="section-heading">
                    <span class="sub-title">our news</span>
                    <h2 class="h1 mb-0">Our Latest Blog</h2>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6 col-xl-4">
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

                    <div class="col-lg-6 col-xl-4 d-none d-lg-block">
                        <div>
                            <div class="image-hover">
                                <img src="img/blog/blog-07.jpg" alt="...">
                            </div>    
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="blog-style1 blog-two-style1 mb-1-9 h-auto">
                            <div class="text-holder">
                                <div class="category-box">
                                    <a href="#!">Learning</a>
                                </div>
                                <h3 class="display-25 font-weight-700 mb-3"><a href="blog-details.php">Is eLearn any good? 7 ways you can be certain.</a></h3>
                                <div class="bottom-box">
                                    <div class="btn-box">
                                        <a href="blog-details.php">
                                            <span class="icon-right-arrow-1"></span>Read More
                                        </a>
                                    </div>
                                    <div class="meta-info">
                                        <ul class="mb-0 ps-0">
                                            <li><span class="icon-calendar"></span>4 Jul 2023</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-style1 blog-two-style1 h-auto">
                            <div class="text-holder">
                                <div class="category-box">
                                    <a href="#!">Career</a>
                                </div>
                                <h3 class="display-25 font-weight-700 mb-3">
                                    <a href="blog-details.php">How will eLearn be in the future.</a>
                                </h3>
                                <div class="bottom-box">
                                    <div class="btn-box">
                                        <a href="blog-details.php">
                                            <span class="icon-right-arrow-1"></span>Read More
                                        </a>
                                    </div>
                                    <div class="meta-info">
                                        <ul class="mb-0 ps-0">
                                            <li><span class="icon-calendar"></span>2 Jul 2023</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- PARTNER
        ================================================== -->
        <section class="bg-very-light-gray py-8">
            <div class="container">
                <div class="client-carousel owl-carousel owl-theme">
                    <div class="text-center">
                        <img src="img/logos/logo-mon.png" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="img/logos/monlarama-logo-png-2.png" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="img/logos/egate.png" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="img/logos/logo-mon.png" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="img/logos/monlarama-logo-png-2.png" alt="...">
                    </div>
                     <div class="text-center">
                        <img src="img/logos/egate.png" alt="...">
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