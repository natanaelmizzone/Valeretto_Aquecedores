<?php
// Captura o valor enviado pelo formulário via método POST no campo 'email', usando o operador de coalescência nula para deixar vazio caso não exista
$email_digitado = $_POST['email'] ?? '';

// Captura o valor enviado pelo formulário via método POST no campo 'senha', usando o operador de coalescência nula para deixar vazio caso não exista
$senha_digitada = $_POST['senha'] ?? '';

// Define o endereço de e-mail correto e esperado para o acesso do administrador
$email_correto = "admin@valeretto.com";
// Define a senha correta e esperada para o acesso do administrador
$senha_correta = "admin123";

// Compara se o e-mail e a senha digitados pelo usuário são idênticos aos dados corretos cadastrados
if ($email_digitado === $email_correto && $senha_digitada === $senha_correta) {
    // Inicia ou retoma a sessão do PHP no servidor para guardar as informações do usuário logado
    session_start();
    // Cria uma variável de sessão e define como verdadeira para confirmar que o administrador está logado com sucesso
    $_SESSION['admin_logado'] = true;
    // Armazena na sessão o nome fantasia do administrador para ser exibido nas páginas do painel
    $_SESSION['admin_nome'] = "Administrador Geral";
    
    // Redireciona o navegador do usuário imediatamente para a página principal do painel administrativo
    header("Location: pag-admin.php");
    // Interrompe a execução do script atual para garantir que o redirecionamento aconteça sem problemas
    exit();

// Caso os dados digitados não batam com as credenciais corretas
} else {

    // Redireciona o navegador de volta para a tela de login administrativa, enviando uma mensagem de erro via URL
    header("Location: admin-login.php?mensagem=Acesso negado! Dados incorretos.");
    // Interrompe a execução do script atual para finalizar o processo de tentativa falhada
    exit();
} // Fim da estrutura condicional de verificação de login
?>
