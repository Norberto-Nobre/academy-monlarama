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
    $bilhete = $dados['bilhete'];
    $curso = $dados['curso'];
    // $mensagem = $dados['message'];
    
    // Configuração do PHPMailer
   $mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 0;                      
    $mail->isSMTP();                                           
    $mail->Host       = 'mail.monlarama.ao';                                  //smtp.gmail.com
    $mail->SMTPAuth   = true; 
    $mail->Username = 'academy@monlarama.ao';  // Seu e-mail
    $mail->Password = 'S$bL_}_La?Gd';  // Sua senha
    // $mail->Username   = 'candidatura@egatecloud.ao';                                  //candidaturaegatecloud@gmail.com
    // $mail->Password   = 'candidatura.2024#';                                  //rbws rrju vbuz mmdh
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;   
   

   // Remetente e destinatário
    $mail->setFrom('academy@monlarama.ao', 'Sistema de Inscrições');
    $mail->addReplyTo($email, $nome); // Para responder ao candidato
    $mail->addAddress('academy@monlarama.ao', 'Mon Larama Academy');

        // Conteúdo do e-mail
        // Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Nova Inscrição Recebida';
        
        // Corpo do e-mail
        $mail->Body = "
            <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #337633; color:#FCD600; padding: 20px; text-align: center; }
                .content { padding: 20px; }
                .info-item { margin: 10px 0; padding: 10px; background-color: #f9f9f9; border-left: 4px solid #337633; }
                .footer { text-align: center; padding: 20px; font-size: 12px; color: #666; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>Nova Inscrição Recebida</h2>
                </div>
                <div class='content'>
                    <p>Uma nova inscrição foi recebida através do site:</p>
                    
                    <div class='info-item'>
                        <strong>Nome:</strong> " . htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') . "
                    </div>
                    
                    <div class='info-item'>
                        <strong>Email:</strong> " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "
                    </div>
                    
                    <div class='info-item'>
                        <strong>Contacto:</strong> " . htmlspecialchars($contacto, ENT_QUOTES, 'UTF-8') . "
                    </div>
                    
                    <div class='info-item'>
                        <strong>Bilhete de Identidade:</strong> " . htmlspecialchars($bilhete, ENT_QUOTES, 'UTF-8') . "
                    </div>

                     <div class='info-item'>
                        <strong>Curso:</strong> " . htmlspecialchars($curso, ENT_QUOTES, 'UTF-8') . "
                    </div>
                    
                    <div class='info-item'>
                        <strong>Data/Hora:</strong> " . date('d/m/Y H:i:s') . "
                    </div>
                    
                    <div class='info-item'>
                        <strong>IP:</strong> " . htmlspecialchars($_SERVER['REMOTE_ADDR'], ENT_QUOTES, 'UTF-8') . "
                    </div>
                </div>
                
                <div class='footer'>
                    <p>Este email foi enviado automaticamente pelo sistema de inscrições.</p>
                </div>
            </div>
        </body>
        </html>
        ";

        // Enviar o e-mail
        $mail->send();

        // Enviar e-mail de confirmação para o candidato
$mailResposta = new PHPMailer(true);
$mailResposta->isSMTP();
$mailResposta->Host = 'mail.monlarama.ao'; // mesmo host
$mailResposta->SMTPAuth = true;
$mailResposta->Username = 'academy@monlarama.ao'; // mesmo usuário
$mailResposta->Password = 'S$bL_}_La?Gd'; // mesma senha
$mailResposta->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mailResposta->Port = 465;

$mailResposta->setFrom('academy@monlarama.ao', 'Mon Larama Academy');
$mailResposta->addAddress($email, $nome); // destinatário: candidato

$mailResposta->isHTML(true);
$mailResposta->CharSet = 'UTF-8';
$mailResposta->Subject = 'Confirmação da sua inscrição';

$mailResposta->Body = "
    <p>Olá <strong>$nome</strong>,</p>
    <p>Recebemos a sua inscrição com sucesso no curso <strong>$curso</strong>.</p>
    <p>Entraremos em contacto consigo brevemente.</p>
    <br>
    <p>Atenciosamente,<br>Equipe Mon Larama Academy</p>
";

$mailResposta->send(); // envia o e-mail de confirmação

      echo "<h5 class='mb-0 text-success'> Inscrição enviada com sucesso!</h5>";
    } catch (Exception $e) {
        echo "<h5 class='mb-0 text-success'> Falha no envio, tente mais tarde</h5>";
    }
}