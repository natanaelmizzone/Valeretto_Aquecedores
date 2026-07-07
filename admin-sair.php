<?php
// Inicia ou retoma a sessão atual do usuário no servidor para ter acesso às variáveis globais
session_start();

// Destrói e remove da memória a variável de sessão que confirmava se o administrador estava autenticado
unset($_SESSION['admin_logado']);

// Destrói e remove da memória a variável de sessão que armazenava o nome do administrador
unset($_SESSION['admin_nome']);

// Redireciona o navegador do usuário imediatamente para a página de login do painel administrativo, enviando uma mensagem de sucesso via URL
header("Location: admin-login.php?mensagem=Você saiu do painel com segurança.");

// Interrompe imediatamente a execução deste script PHP para garantir que nenhum outro código abaixo seja processado
exit();
?>
