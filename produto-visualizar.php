<?php
// Define o título que será exibido na aba do navegador
$titulo_da_pagina = "Visualizar Produtos";

// Inicia ou retoma a sessão do usuário no servidor
session_start();

// Inclui o arquivo que verifica se o usuário é administrador (bloqueia acessos não autorizados)
include "admin-trava.php"; 

// Inclui o topo da página (tags <head>, estilos CSS, etc.)
include "inc-cabecalho.php";

// Inclui o arquivo que faz a conexão com o banco de dados
include "inc-conexao.php";

// Captura o ID do produto enviado através do link (URL)
$id = $_GET['id'];

// Cria o comando SQL para buscar todos os dados do produto com o ID capturado
$sql = "select * from tb_produto where id_produto = $id";

// Executa a consulta SQL no banco de dados usando a conexão estabelecida
$resultado = mysqli_query($conexao, $sql);

// Cria as variáveis vazias para evitar erros caso nenhum produto seja encontrado
$nome = $descricao = $preco = $foto = "";

// Percorre a linha de resultado retornada pelo banco de dados
while($linha = mysqli_fetch_assoc($resultado)){
    // Guarda o nome do produto na variável $nome
    $nome = $linha['nome_produto'];
    // Guarda a descrição do produto na variável $descricao
    $descricao = $linha['descricao_produto'];

    $estoque   = $linha['estoque_produto'];
    // Guarda o preço do produto na variável $preco
    $preco = $linha['preco_produto'];
    // Guarda o caminho/nome da imagem na variável $foto
    $foto = $linha['imagem_produto'];
}

?>
<body>
    

    <main class="container my-5 text-center">
        <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <a class="logo navbar-brand" href="index.php"><img src="./assets/img/transparent_png/cropped-Valeretto-Logo.png"
            alt="Inicio"></a>

        </div>

        <div>
            <a href="index.php" class="btn btn-secondary shadow-sm me-1">Inicio Site</a>
            <a href="pag-admin.php" class="btn btn-secondary shadow-sm me-1">Painel ADM</a>
            <a href="admin-sair.php" class="btn btn-secondary shadow-sm">Sair do Painel</a>
        </div>
    </div>
        <hr>
        <h1 class="fw-bold fs-2 mb-4 text-dark">Produto Registrado:</h1>
        
        <div class="d-flex justify-content-center mb-4">
            <img class="img-fluid object-fit-cover rounded shadow-sm border" 
                 src="<?=$foto; ?>" 
                 alt="<?=$nome; ?>" 
                 style="width: 250px; height: 250px;">
        </div>
        
        <div class="lead mb-2">
            <span class="text-muted small text-uppercase d-block">Produto</span>
            <strong class="fs-4 text-dark"><?=$nome; ?></strong>
        </div>

        <div class="mb-3 mx-auto" style="max-width: 500px;">
            <span class="text-muted small text-uppercase d-block">Descrição</span>
            <span class="text-secondary"><?=$descricao; ?></span>
        </div>
                                   
        <div class="mb-4">
            <small class="text-muted small text-uppercase d-block">Disponível: <?php echo $estoque; ?> unidades.</small>
        </div>

        <div class="mb-4">
            <span class="text-muted small text-uppercase d-block">Preço</span>
            <strong class="fs-3 text-success">R$ <?=$preco; ?></strong>
        </div>
        <hr>
    </main>

    

<?php 
// Encerra oficialmente a conexão ativa com o banco de dados para liberar memória
mysqli_close($conexao);
?>