<?php 

// Inclui o script de segurança que valida se o usuário está autenticado como administrador
include "admin-trava.php"; 

// Captura o ID do produto enviado através da URL (método GET) para saber qual item deletar
$id = $_GET['id'];

// Inclui o arquivo externo responsável por abrir a conexão com o banco de dados
include "inc-conexao.php";


// Monta a instrução SQL para apagar definitivamente o produto correspondente ao ID informado
$sql = "delete from tb_produto where id_produto = {$id}";

// Executa o comando de exclusão (DELETE) no banco de dados
$resultado = mysqli_query($conexao, $sql);

// Fecha formalmente a conexão ativa com o banco de dados para liberar memória do servidor
mysqli_close($conexao);

// Redireciona o navegador do usuário automaticamente de volta para a página principal do painel administrativo
header('Location:pag-admin.php');
?>
