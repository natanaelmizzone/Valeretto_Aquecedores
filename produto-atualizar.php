<?php
// Captura o ID do produto enviado através da URL (método GET)
$id = $_GET['id'];

// Captura os novos dados do produto enviados pelo formulário (método POST)
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$foto = $_POST['imagem'];
$estoque= $_POST['estoque'];

// Troca a vírgula por ponto para o banco aceitar os centavos.
$preco = str_replace(',', '.', $preco);

// Inclui o arquivo externo que faz a conexão com o banco de dados
include "inc-conexao.php";

// Monta a instrução SQL para atualizar os dados do produto específico baseado no ID
$sql = "update tb_produto set nome_produto='{$nome}', descricao_produto='{$descricao}', preco_produto={$preco}, imagem_produto='{$foto}', estoque_produto='{$estoque}' where id_produto={$id}";

// Executa a query de atualização no banco de dados
$resultado = mysqli_query($conexao, $sql);

// Fecha a conexão com o banco de dados para liberar recursos do servidor
mysqli_close($conexao);

// Redireciona o navegador do usuário automaticamente de volta para a página de administração
header('Location:pag-admin.php');

?>
