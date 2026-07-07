<?php
// Verifica se a sessão do PHP ainda não foi iniciada no servidor
if (session_status() === PHP_SESSION_NONE) {
    // Inicia uma nova sessão ou retoma a sessão existente para este usuário
    session_start();
} // Fim da verificação do status da sessão

// Vai direcionar a tela de login do admin

// Verifica se a variável de sessão de login não existe OU se o valor dela não é igual a verdadeiro

if (!isset($_SESSION['admin_logado']) || $_SESSION['admin_logado'] !== true) {
    // Redireciona o navegador do usuário para a página de login do administrador, enviando um aviso via URL
    header("Location: admin-login.php?mensagem=Faça login para acessar o painel.");
    // Interrompe imediatamente a execução do script para bloquear o acesso ao restante da página restrita
    exit();
} // Fim da validação de segurança de login do administrador
?>
