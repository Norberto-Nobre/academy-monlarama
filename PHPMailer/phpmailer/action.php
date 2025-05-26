<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($dados)) {
    $posicao = $_POST['posicao'];
    /* var_dump($posicao);
    echo '<hr>';
    foreach($posicao as $key => $pos){
        echo $pos.' ';
        echo '<hr>';
    } */
        $nome_completo = $dados['nome'].' '.$dados['sobre_nome'];
        $data_nascimento = $dados['data_nascimento'];
        $numero_bi = $dados['numero_bi'];
        $genero = $dados['genero'];
        $email = $dados['email'];
        $contactos = $dados['pri_telefone'] . '-' . $dados['seg_telefone'];
        $endereco = $dados['endereco'] . '-' . $dados['pais'] . '-' . $dados['provincia'] . '-' . $dados['municipio'];
        $cargo_atual = $dados['cargo_atual'];
        $mensagem = $dados['mensagem'];
}
$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 0;                      
    $mail->isSMTP();                                           
    $mail->Host       = 'mail.egatecloud.ao';                                  //smtp.gmail.com
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'candidatura@egatecloud.ao';                                  //candidaturaegatecloud@gmail.com
    $mail->Password   = 'candidatura.2024#';                                  //rbws rrju vbuz mmdh
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;   
   

    $mail->setFrom($email, $nome_completo);
    $mail->addAddress('candidatura@egatecloud.ao', 'Egate Cloud');    
if($_FILES){
    $cont = 0;
    $documentos = $_FILES;
    foreach($documentos['documentos']['name'] as $key => $value){
        $cont++;
    }
for ($i = 0; $i < count($_FILES['documentos']['tmp_name']); $i++) {
    $mail->addAttachment($_FILES['documentos']['tmp_name'][$i], $_FILES['documentos']['name'][$i] );  
 }
}
foreach($posicao as $pos){
    $val = $pos;
$body = "
 <!DOCTYPE html>
 <html lang='pt-pt'>
 <head>
     <meta charset=''>
     <meta name='viewport' content='width=device-width, initial-scale=1.0'>
     <title>Document</title>
 </head>
 <body>
 <h5>Nome Completo: $nome_completo</h5>
 <h5>Data de Nascimento: $data_nascimento</h5>
 <h5>Nº BI: $numero_bi</h5>
 <h5>Genero: $genero</h5>
 <h5>email: $email</h5>
 <h5>Contactos: $contactos</h5>
 <h5>Endereço: $endereco</h5>
 <h5>Cargo Atual: $cargo_atual</h5>
 <h5>Posição que se candidata: $val</h5>
 <h5>Mensagem: $mensagem</h5>

 </body>
 </html>";
}
    //$this->mail->setLanguage= 'pt-br'; 
    //$this->mail->CharSet = 'utf-8';
    $mail->isHTML(true);                             
    $mail->Subject = 'Candidatura via Site';
    $mail->Body    = $body;


    $mail->send();
    echo
     " 
    <script> 
     alert('Message was sent successfully!');
     document.location.href = 'index.php';
    </script>
    ";
    //cho ('Email enviado com sucesso');
} catch (Exception $e) {
    echo "Falha ao enviar email. Tente mais tarde: {$mail->ErrorInfo}";
}


