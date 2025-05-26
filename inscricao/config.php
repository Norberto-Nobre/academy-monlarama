<?php
// config.php - Arquivo de configuração
// IMPORTANTE: Mantenha este arquivo fora do diretório público ou proteja-o

// Configurações de email
define('SMTP_HOST', 'mail.academy.monlarama.ao');
define('SMTP_USERNAME', 'inscricao@academy.monlarama.ao');
define('SMTP_PASSWORD', '(iianC;=2wAp'); // Altere esta senha regularmente
define('SMTP_PORT', 465);
define('SMTP_SECURE', 'ssl');

// Configurações gerais
define('FROM_EMAIL', 'inscricao@academy.monlarama.ao');
define('FROM_NAME', 'Sistema de Inscrições');
define('TO_EMAIL', 'inscricao@academy.monlarama.ao');
define('TO_NAME', 'Mon Larama Academy');

// Configurações de segurança
define('MAX_ATTEMPTS_PER_HOUR', 3);
define('MIN_MESSAGE_LENGTH', 10);
define('MIN_NAME_LENGTH', 2);

// Gerar token CSRF se não existir
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>