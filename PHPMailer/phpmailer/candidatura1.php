<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-hover" data-theme-mode="light">
        
    <head>
        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="EGATE CLOUD Technologies Private Limited">
        <meta name="keywords" content="Hosting Website Templates, PHP Hosting Website Template, Hosting PHP Template, Professional Hosting PHP Template, Top Web Hosting PHP Templates, Web Hosting PHP Template, web hosting Bootstrap template, This professional Hosting PHP Template, Web Hosting Template, Bootstrap hosting template, Web Hosting Template Bootstrap, Bootstrap Web Hosting Template, Web Hosting Programming Template.">

        <!-- TITLE -->
        <title>EGATECLOUD SA – Data Center Infraestruturas & Serviços em Nuvem </title>
        
        <!-- FAVICON -->
        <link rel="icon" href="assets/images/brand/favicon.ico" type="image/x-icon">
        
        <?php include 'layouts/styles.php'; ?>

        <!-- SWIPER CSS-->
        <link rel="stylesheet" href="assets/libs/swiper/swiper-bundle.min.css">
    
    </head>
    
    
    <style>
        .edit{
            top:-121px;
            z-index: 5;
            position: relative;
             background-color: white;
        }
        .form-contaiener{
    max-width: 1000px;
    padding: 1rem;
}
        
    </style>

    <body class="main-body light-theme">

        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top" class="back-to-top rounded-circle shadow all-ease-03 fade-in">
            <i class="fe fe-arrow-up"></i>
        </a>
        <!-- END BACK-TO-TOP -->

        <!-- PAGE -->
        <div class="page">
            <div class="head_menu_container">

                <!-- HEADER -->
                <?php include 'layouts/header.php'; ?>

                <!-- END HEADER -->

                <!-- SIDEBAR -->
                <?php include 'layouts/sidebar.php'; ?>

                <!-- END SIDEBAR -->
            </div>

            <!-- MAIN-CONTENT -->
            <div class="main-content app-content">
                <section class="banner-section section banner-1"></section>
                
                 <section class="section overflow-hidden edit">
                 <div class="main-content app-content">
                 <div class="heading-section mt-5">
                                <!--<div class="heading-subtitle"><span class="tx-primary tx-16 fw-semibold">Nossos serviços</span></div>-->
                                <div class="heading-title">Candidatura <span class="tx-primary">Espontânea </span></div>
                                <div class="heading-description">Venha fazer parte da nossa equipe.</div>
                            </div>
                            </div>
                            
<main class="w-100 m-auto form-signin form-contaiener ">
   <form class="row g-3 needs-validation" validate method="POST" action="action.php" name="candidatura" enctype="multipart/form-data">
      <div class="col-md-6">
        <label class="form-label" for="">Nome <span style="color: red;font-size: 18pt">*</span></label>
        <input type="text" name="nome" class="form-control is-valid border border-primary" id="nome" value="" required>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      <div class="col-md-6">
        <label for="" class="form-label">Sobre Nome <span style="color: red;font-size: 18pt">*</span></label>
        <input type="text" name="sobre_nome" class="form-control border border-primary" id="sobre_nome" required>
      </div>
      <div class="col-md-6">
        <label for="" class="form-label">Data de Nascimento</label>
        <input type="date" name="data_nascimento" class="form-control border border-primary" id="data_nascimento" min="1970-01-01" max="2030-12-31">
      </div>
      <div class="col-md-6">
        <label for="" class="form-label">Nº do Bilhete de identidade <span style="color: red;font-size: 18pt">*</span></label>
        <input type="text" name="numero_bi" class="form-control border border-primary" id="numero_bi" required>
      </div>

      <div class="col-md-6">
        <label class="form-check-label" for="flexRadioDefault2">
          Genero
          <div class="form-check">
            <input class="form-check-input border border-primary" type="radio" name="genero" value="Masculino" id="genero" checked>
            <label class="form-check-label" for="flexRadioDefault1">
              Masculino
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input border border-primary" type="radio" name="genero" value="Femenino" id="genero">
            <label class="form-check-label" for="flexRadioDefault2">
              Femenino
            </label>
          </div>
        </label>
      </div>
      <div class="col-md-6">
        <label for="" class="form-label">email <span style="color: red;font-size: 18pt;">*</span></label>
        <input type="email" name="email" class="form-control is-valid border border-primary" id="email" required>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      <div class="input-group">
        <span class="input-group-text border border-primary">Contactos <span style="color: red;font-size: 18pt">*</span></span>
        <input type="tel" aria-label="" class="form-control border border-primary" placeholder="1º Telefone" name="pri_telefone" id="pri_telefone" required>
        <input type="tel" aria-label="" class="form-control border border-primary" placeholder="2º Telefone" name="seg_telefone" id="seg_telefone">
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Endereço</label>
        <input type="text" class="form-control border border-primary" name="endereco" id="endereco" placeholder="">
      </div>
      <div class="col-md-4">
        <label for="inputCity" class="form-label">País</label>
        <input type="text" class="form-control border border-primary" name="pais" id="pais">
      </div>
      <div class="col-md-4">
        <label for="inputCity" class="form-label">Provincia</label>
        <input type="text" class="form-control border border-primary" name="provincia" id="provincia">
      </div>
      <div class="col-md-4">
        <label for="inputZip" class="form-label">Municipio</label>
        <input type="text" class="form-control border border-primary" name="municipio" id="municipio">
      </div>
      <select class="form-select border border-primary" aria-label="Default select example" name="cargo_atual">
        <option selected>Qual é a sua situação proficional</option>
        <option value="Empregado">Empregado</option>
        <option value="Desempregado">Desempregado</option>
        <option value="Trabalhando por conta própria">Trabalhando por conta própria</option>
        <option value="Estudante">Estudante</option>
        <option value="Outros">Outros</option>
      </select>

      <div class="col-md-6">
      <label for="inputZip" class="form-label">Para qual possição você esta se candidatando</label>
      <div class="form-check">
        <input class="form-check-input border border-primary" type="checkbox" value="Desenvolvedor back-end" id="desenvolvedor_back_end" name="posicao[]">
        <label class="form-check-label" for="flexCheckDefault">
        Desenvolvedor back-end
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input border border-primary" type="checkbox" value="Desenvolvedor front-end" id="desenvolvedor_front_end" name="posicao[]">
        <label class="form-check-label" for="flexCheckChecked">
        Desenvolvedor front-end
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input border border-primary" type="checkbox" value="Gestor de mídias sociais" id="Gestor_de_mídias_sociais" name="posicao[]">
        <label class="form-check-label" for="flexCheckDefault">
        Gestor de mídias sociais
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input border border-primary" type="checkbox" value="Cientista de dados" id="cientista_de_dados" name="posicao[]">
        <label class="form-check-label" for="flexCheckChecked">
        Cientista de dados
        </label>
      </div>
      </div>

      <div class="col-md-6 mt-5">
      <div class="form-check">
        <input class="form-check-input border border-primary" type="checkbox" value="Gestor de projetos" id="gestor_de_projetos" name="posicao[]">
        <label class="form-check-label" for="flexCheckDefault">
        Gestor de projetos
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input border border-primary" type="checkbox" value="Desenvolvedor web" id="desenvolvedor_web" name="posicao[]">
        <label class="form-check-label" for="flexCheckChecked">
        Desenvolvedor web
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input border border-primary" type="checkbox" value="Desenvolvedor de aplicativo móvel" id="desenvolvedor_de_aplicativo_móvel" name="posicao[]">
        <label class="form-check-label" for="flexCheckDefault">
        Desenvolvedor de aplicativo móvel
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input border border-primary" type="checkbox" value="Outros" id="Outros" name="posicao[]">
        <label class="form-check-label" for="flexCheckChecked">
        Outros <span>(Especifica na mensagem)</span>
        </label>
      </div>
      </div>

      <label class="form-label" for="inputGroupFile01">Documentos <span style="color: red;font-size: 18pt">*</span></label>
      <p style="color: #777; font-size: 10pt; margin-bottom: 0; "><b>Apenas documentos PDFs</b><span style="font-size: 13pt; color: #00BFFF ;"> (BI, curriculum vitae, Certificado e Carta de apresentação)</span></p>
      <div class="mb-3">
        <input class="form-control border border-primary" type="file" id="documentos" name="documentos[]" accept=".pdf" multiple required>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Escreva uma mensagem</label>
        <textarea class="form-control border border-primary" name="mensagem" id="mensagem" rows="3"></textarea>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </form>
</main>
                            </section>

                
            
            <!-- END MAIN-CONTENT -->

            <!-- FOOTER -->
            <?php include 'layouts/footer.php'; ?>

            <!-- END FOOTER -->
        </div>
        <!-- END PAGE -->

        <!-- ACCEPT-COOKIE -->
        <?php include 'layouts/accept-cookie.php'; ?>

        <!-- END ACCEPT-COOKIE -->

        <!-- SCRIPTS -->
        <?php include 'layouts/scripts.php'; ?>

        <!-- SWIPER JS -->
        <script src="assets/libs/swiper/swiper-bundle.min.js"></script>
        <script src="assets/js/swiper.js"></script>

        <!-- COUNTDOWN JS -->
        <script src="assets/js/countdown.js"></script>

        <!-- STICKY JS -->
        <script src="assets/js/sticky.js"></script>

        <!-- CUSTOM JS -->
        <script src="assets/js/custom.js"></script>

        <!-- END SCRIPTS -->

    </body>
</html>