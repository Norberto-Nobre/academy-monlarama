<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/phpmailer/vendor/autoload.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($dados)) {
    
     // Capture os dados do primeiro formulário (configurações VPS)
   
    $nome = $dados['name'];
    $email = $dados['email'];
    $contacto = $dados['contact'];
    $curso = $dados['course'];
    $mensagem = $dados['message'];
    
    // Configuração do PHPMailer
   $mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 0;                      
    $mail->isSMTP();                                           
    $mail->Host       = 'mail.academy.monlarama.ao';                                  //smtp.gmail.com
    $mail->SMTPAuth   = true; 
    $mail->Username = 'inscricao@academy.monlarama.ao';  // Seu e-mail
    $mail->Password = '(iianC;=2wAp';  // Sua senha
    // $mail->Username   = 'candidatura@egatecloud.ao';                                  //candidaturaegatecloud@gmail.com
    // $mail->Password   = 'candidatura.2024#';                                  //rbws rrju vbuz mmdh
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;   
   

    $mail->setFrom($email, $nome_completo);
    $mail->addAddress('inscricao@academy.monlarama.ao', 'MTT - Prestação de serviço');    

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Solicitacao de Orcamento via site';
        
        // Corpo do e-mail
        $mail->Body = "
            <h3>Informa&ccedil;&atilde;o da Solicita&ccedil;&atilde;o:</h3>
            <ul>
                <li><b>Nome:</b> $nome</li>
                <li><b>Email:</b> $email</li>
                <li><b>Contacto:</b> $contacto</li>
                <li><b>Curso:</b> $curso</li>
                <li><b>mensagem:</b> $mensagem</li>
            </ul>
        ";

        // Enviar o e-mail
        $mail->send();
        echo
        " 
    <script> 
     alert('Solicitação enviado com sucesso!');
     document.location.href = '../index.php';
    </script>";
    } catch (Exception $e) {
        echo "O e-mail não pôde ser enviado. Erro: {$mail->ErrorInfo}";
    }
}