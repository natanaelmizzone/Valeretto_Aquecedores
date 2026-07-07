<?php 
// Estabelece a conexão com o banco de dados MySQL informando o servidor, usuário, senha e o nome do banco de dados
$conexao = mysqli_connect("localhost", "root", "", "db_valeretto");

// Verifica se a conexão com o banco de dados falhou (se retornou um valor falso)
if(!$conexao){
    // Interrompe imediatamente a execução do script exibindo um título de erro e a mensagem técnica detalhada da falha
    die("<h3>Erro</h3>".mysqli_connect_error());
} // Fim da verificação de erro na conexão
?>
