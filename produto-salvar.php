<?php
// Inicia ou retoma a sessão ativa no servidor para validar dados do usuário conectado
session_start();

// Inclui o arquivo de segurança que bloqueia o acesso caso o usuário não seja um administrador logado
include "admin-trava.php"; 

// Captura as informações preenchidas no formulário enviadas através do método POST
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
// Captura a quantidade em estoque; caso o campo não tenha sido preenchido, define o padrão como 0
$estoque   = $_POST['estoque'] ?? 0; 
$foto = $_POST['imagem'];

// Troca a vírgula por ponto antes de salvar.
$preco = str_replace(',', '.', $preco);

// Exibe na tela as variáveis capturadas para conferência visual (etapa de testes/depuração)
echo "$nome - $descricao - $preco - $estoque - $foto";


#abrir conexão
// Inclui o script externo que realiza a conexão com o banco de dados do sistema
include "inc-conexao.php";

# inserir os dados
// aspas simples em '$preco' para o banco não quebrar caso o valor vá vazio por algum motivo.
// Monta o comando SQL para inserir um novo registro na tabela de produtos com as informações recebidas
$sql = "insert into tb_produto(nome_produto, descricao_produto, preco_produto, estoque_produto, imagem_produto) values('$nome', '$descricao', '$preco', '$estoque', '$foto')";

// Executa a instrução SQL de inserção (INSERT) no banco de dados conectado
$resultado = mysqli_query($conexao , $sql);

// Avalia se o comando foi executado corretamente pelo banco de dados
if($resultado){
    // Exibe um aviso simples caso o salvamento tenha ocorrido perfeitamente
    echo "cadastrado com sucesso";
}else{
    // Exibe um aviso caso ocorra alguma falha de sintaxe ou erro de comunicação com o banco
    echo "deu algum problema";
}

# fechar conexao
// Redireciona o navegador do usuário automaticamente para o painel administrativo principal
header("Location: pag-admin.php");

// Encerra a conexão ativa com o banco de dados para liberar recursos do servidor
mysqli_close($conexao);

?>
