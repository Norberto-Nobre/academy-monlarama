<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>

<body>

  <style>
    .form-contaiener {
      max-width: 1000px;
      padding: 1rem;
    }
  </style>

  <main class="w-100 m-auto form-signin form-contaiener">
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
        <input class="form-check-input" type="checkbox" value="Desenvolvedor back-end" id="desenvolvedor_back_end" name="posicao[]">
        <label class="form-check-label" for="flexCheckDefault">
        Desenvolvedor back-end
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Desenvolvedor front-end" id="desenvolvedor_front_end" name="posicao[]">
        <label class="form-check-label" for="flexCheckChecked">
        Desenvolvedor front-end
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Gestor de mídias sociais" id="Gestor_de_mídias_sociais" name="posicao[]">
        <label class="form-check-label" for="flexCheckDefault">
        Gestor de mídias sociais
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Cientista de dados" id="cientista_de_dados" name="posicao[]">
        <label class="form-check-label" for="flexCheckChecked">
        Cientista de dados
        </label>
      </div>
      </div>

      <div class="col-md-6 mt-5">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Gestor de projetos" id="gestor_de_projetos" name="posicao[]">
        <label class="form-check-label" for="flexCheckDefault">
        Gestor de projetos
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Desenvolvedor web" id="desenvolvedor_web" name="posicao[]">
        <label class="form-check-label" for="flexCheckChecked">
        Desenvolvedor web
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Desenvolvedor de aplicativo móvel" id="desenvolvedor_de_aplicativo_móvel" name="posicao[]">
        <label class="form-check-label" for="flexCheckDefault">
        Desenvolvedor de aplicativo móvel
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Outros" id="Outros" name="posicao[]">
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>