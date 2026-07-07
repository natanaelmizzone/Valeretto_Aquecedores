<?php
// Inclui o script de segurança que trava a página e valida se o usuário está logado como administrador
include "admin-trava.php"; 

// Captura o ID do produto enviado pela URL; se não existir, define o valor padrão como 0
$id = $_GET['id']?? 0;

// Inclui o arquivo de configuração para abrir a conexão com o banco de dados
include "inc-conexao.php";

// Prepara a instrução SQL para selecionar todas as colunas do produto que corresponde ao ID recebido
$sql = "select * from tb_produto where id_produto = {$id}";

// Executa a consulta no banco de dados
$resultado = mysqli_query($conexao, $sql);

// Inicializa variáveis vazias para evitar erros caso nenhum produto seja encontrado no banco
$nome = $descricao = $preco = $foto = $estoque = "";

// Percorre o registro retornado do banco de dados (espera-se apenas um resultado por conta do ID)
while($linha = mysqli_fetch_assoc($resultado)){

    // Alimenta as variáveis locais com as respectivas informações vindas das colunas do banco
    $nome = $linha['nome_produto'];
    $descricao = $linha['descricao_produto'];
    $preco = $linha['preco_produto'];
    $foto = $linha['imagem_produto'];
    // Captura a quantidade em estoque; se o valor no banco for nulo, define como 0
    $estoque = $linha['estoque_produto'] ?? 0; 


}

// Define uma variável de texto com o título que será renderizado dinamicamente na página
$titulo_da_pagina = "Editar produto";

// Inclui o arquivo de cabeçalho do layout (tags iniciais do HTML, links de CSS, etc.)
include "inc-cabecalho.php";
?>

<body>
    <main class="container my-5">
<div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <a class="logo navbar-brand" href="index.php"><img src="./assets/img/transparent_png/cropped-Valeretto-Logo.png"
            alt="Inicio"></a>

        </div>

        <div>
            <a href="index.php" class="btn btn-secondary shadow-sm me-1">Inicio Site</a>
            <a href="pag-admin.php" class="btn btn-secondary shadow-sm me-1">Painel ADM</a>
            <a href="admin-sair.php" class="btn btn-secondary shadow-sm">Sair do Panel</a>
        </div>
    </div>

    </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 bg-white p-5 rounded shadow-sm">
        <h1 class="mb-4">Editar produto: <?=$nome?></h1>

<form method="post" action="produto-atualizar.php?id=<?=$id?>" id="formProduto">
    
    <div class="mb-3">
        <label class="form-label fw-bold" for="nome">Nome do Produto:</label>
        <select name="nome" id="nome" required class="form-select">
            <option value="" disabled <?= empty($nome) ? 'selected' : '' ?>>Selecione um produto...</option>
            <option value="Aquecedor a Gás" <?= ($nome == "Aquecedor a Gás") ? 'selected' : '' ?>>Aquecedor a Gás</option>
            <option value="Aquecedor Solar" <?= ($nome == "Aquecedor Solar") ? 'selected' : '' ?>>Aquecedor Solar</option>
            <option value="Aquecedor Solar de Piscina" <?= ($nome == "Aquecedor Solar de Piscina") ? 'selected' : '' ?>>Aquecedor Solar de Piscina</option>
            <option value="Iluminação de Piscina" <?= ($nome == "Iluminação de Piscina") ? 'selected' : '' ?>>Iluminação de Piscina</option>
            <option value="Pressurizadoras" <?= ($nome == "Pressurizadoras") ? 'selected' : '' ?>>Pressurizadoras</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Descrição:</label>
        <textarea name="descricao" id="descricao" required class="form-control" rows="4" placeholder="Detalhes sobre o tamanho, material, etc."><?=$descricao?></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Preço:</label>
        <div class="input-group">
            <span class="input-group-text">R$</span>
            <input type="text" name="preco" id="preco" value="<?= str_replace('.', ',', $preco) ?>" required class="form-control" placeholder="0,00">        </div>
    </div>


    <div class="mb-3">
        <label for="estoque" class="form-label fw-bold">Estoque Inicial (Quantidade):</label>
        <input type="number" id="estoque" name="estoque" value="<?=$estoque?>" required class="form-control" placeholder="Ex: 10">
    </div>


    <div class="mb-4">
        <label class="form-label fw-bold">Imagem do Produto:</label>
        <input type="text" name="imagem" id="imagem" value="<?=$foto?>" required class="form-control" placeholder="https://exemplo.com/imagem.jpg">
        <small class="text-muted">Formatos aceitos: JPG, JPEG, PNG ou WEBP.</small>
    </div>

    
    <button type="submit" class="btn btn-success btn-lg px-4">Atualizar Produto</button>
    <a href="pag-admin.php" class="btn btn-secondary btn-lg">Voltar</a>
    
</form>


    </div>
</main>
<script src="./src/js/script.js"></script>

<?php 
// Fecha formalmente a conexão com o banco de dados após carregar todo o formulário
mysqli_close($conexao);
?>
