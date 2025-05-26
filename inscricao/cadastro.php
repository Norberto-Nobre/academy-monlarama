<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/phpmailer/vendor/autoload.php';

// Função para sanitizar dados
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Função para validar email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Função para validar telefone (formato simples)
function validatePhone($phone) {
    return preg_match('/^[0-9+\-\s()]{9,15}$/', $phone);
}

// Verificar se é uma requisição POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit();
}

// Verificar token CSRF (adicione este campo no seu formulário)
if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die('Erro de segurança: Token CSRF inválido.');
}

// Rate limiting simples (máximo 3 envios por IP por hora)
$ip = $_SERVER['REMOTE_ADDR'];
$rate_limit_file = sys_get_temp_dir() . '/rate_limit_' . md5($ip);

if (file_exists($rate_limit_file)) {
    $attempts = json_decode(file_get_contents($rate_limit_file), true);
    $current_time = time();
    
    // Filtrar tentativas da última hora
    $attempts = array_filter($attempts, function($timestamp) use ($current_time) {
        return ($current_time - $timestamp) < 3600; // 1 hora
    });
    
    if (count($attempts) >= 3) {
        die('Muitas tentativas. Aguarde uma hora antes de tentar novamente.');
    }
    
    $attempts[] = $current_time;
} else {
    $attempts = [time()];
}

file_put_contents($rate_limit_file, json_encode($attempts));

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!$dados) {
    header('Location: contact.php?error=dados_invalidos');
    exit();
}

// Validação e sanitização dos dados
$nome = isset($dados['name']) ? sanitizeInput($dados['name']) : '';
$email = isset($dados['email']) ? sanitizeInput($dados['email']) : '';
$contacto = isset($dados['contact']) ? sanitizeInput($dados['contact']) : '';
$curso = isset($dados['course']) ? sanitizeInput($dados['course']) : '';
$mensagem = isset($dados['message']) ? sanitizeInput($dados['message']) : '';

// Validações
$errors = [];

if (empty($nome) || strlen($nome) < 2) {
    $errors[] = 'Nome é obrigatório e deve ter pelo menos 2 caracteres.';
}

if (empty($email) || !validateEmail($email)) {
    $errors[] = 'Email válido é obrigatório.';
}

if (empty($contacto) || !validatePhone($contacto)) {
    $errors[] = 'Contacto válido é obrigatório.';
}

if (empty($curso)) {
    $errors[] = 'Curso é obrigatório.';
}

if (empty($mensagem) || strlen($mensagem) < 10) {
    $errors[] = 'Mensagem é obrigatória e deve ter pelo menos 10 caracteres.';
}

// Se houver erros, redirecionar com mensagem
if (!empty($errors)) {
    $error_message = implode(' ', $errors);
    header('Location: contact.php?error=' . urlencode($error_message));
    exit();
}

// Configuração do PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurações do servidor
    $mail->SMTPDebug = 0;                      
    $mail->isSMTP();                                           
    $mail->Host = 'mail.academy.monlarama.ao';
    $mail->SMTPAuth = true; 
    $mail->Username = 'inscricao@academy.monlarama.ao';
    $mail->Password = '(iianC;=2wAp'; // ATENÇÃO: Mover para arquivo de configuração
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port = 465;
    
    // Configurações de segurança adiciais
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    // Remetente e destinatário
    $mail->setFrom('inscricao@academy.monlarama.ao', 'Sistema de Inscrições');
    $mail->addReplyTo($email, $nome); // Para responder ao candidato
    $mail->addAddress('inscricao@academy.monlarama.ao', 'Mon Larama Academy');

    // Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Nova Inscrição - Curso: ' . $curso;
    
    // Corpo do e-mail com melhor formatação e dados adicionais
    $mail->Body = "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #f4f4f4; padding: 20px; text-align: center; }
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
                        <strong>Curso:</strong> " . htmlspecialchars($curso, ENT_QUOTES, 'UTF-8') . "
                    </div>
                    
                    <div class='info-item'>
                        <strong>Mensagem:</strong><br>" . nl2br(htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8')) . "
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
        echo
        " 
    <script> 
     alert('Solicitação enviado com sucesso!');
     document.location.href = 'contact.php';
    </script>";
    } catch (Exception $e) {
        echo "O e-mail não pôde ser enviado. Erro: {$mail->ErrorInfo}";
    }
?>