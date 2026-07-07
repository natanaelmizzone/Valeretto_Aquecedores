<?php 
// Inclui os arquivos estruturais e de layout iniciais do site (cabeçalho, menu de navegação, banner principal e início das categorias)
include "inc-cabecalho.php";
include "inc-menu.php";
include "inc-banner.php";
include "inc-categoria-inicio.php"; ?>



<div class="container">
 
<?php
// Define uma variável com o nome da página atual
$titulo_da_pagina = "Produtos";

// Inclui o arquivo responsável por realizar a conexão com o banco de dados
include "inc-conexao.php";

// Captura o termo de busca enviado via URL (método GET); caso não exista, define como texto vazio
$nome_busca = isset($_GET['nome']) ? $_GET['nome'] : '';

// Define a instrução SQL: filtra por um nome específico se houver busca, caso contrário busca todos os produtos
if ($nome_busca != '') {
    $sql = "SELECT * FROM tb_produto WHERE nome_produto = '$nome_busca'";
} else {
    $sql = "SELECT * FROM tb_produto";
}

// Executa a consulta SQL montada acima no banco de dados
$resultado = mysqli_query($conexao, $sql);

// Inicializa variáveis temporárias vazias para os dados do produto
$id = $nome = $descricao = $preco = $foto = "";

// Verifica se a consulta retornou pelo menos 1 registro do banco de dados
if ($resultado->num_rows > 0) {
// Inicia um laço de repetição para percorrer cada um dos produtos encontrados
while($linha = mysqli_fetch_assoc($resultado)){

    // Extrai as informações de cada coluna do banco de dados e janta nas variáveis locais
    $id_prod = $linha['id_produto'];
    $nome = $linha['nome_produto'];
    $descricao = $linha['descricao_produto'];
    $preco = $linha['preco_produto'];
    $foto = $linha['imagem_produto'];


?>

<h4 class="text-center mb-5 mt-5 fw-inter-bold text-uppercase">Produtos <span class="text-orange"><?=$nome; ?> </span></h4>
<div class="row g-4">
 <div class="col-12 col-md-6 col-lg-3">
 
    <div class="card h-100 shadow-sm border-2">
 
         <img src="<?=$foto; ?>" alt="<?=$nome; ?>" class="card-img-top p-3" style="height: 200px; object-fit: contain;">
 
            <div class="card-body d-flex flex-column text-center">
 
                <h5 class="card-title text-dark"><?=$nome; ?></h5>
                           
                    <p class="card-text text-muted small flex-grow-1"><?=$descricao; ?></p>
 
                    <h4 class="text-success mb-3">R$ <?=$preco; ?></h4>
                           
                        <a href="https://api.whatsapp.com/send/?phone=%2B5519988529435&text&type=phone_number&app_absent=0" class="btn btn-primary w-100" target="_blank">COMPRAR</a>

 
                </div>
            </div>
        </div>

<?php 
} // Fim do laço while
}else{
    
    // Mensagem exibida na tela caso nenhum produto seja retornado na busca do banco de dados
    echo "<p class='text-center mb-5 mt-5 fw-inter-bold text-uppercase fs-4'>Produto indisponível no momento...</p>";
}
// Fecha formalmente a conexão ativa com o banco de dados para liberar recursos do servidor
mysqli_close($conexao);
?>
</div>
    </div>

<?php
// Inclui os arquivos estruturais e de layout finais do site (seção de depoimentos, rodapé da categoria e rodapé geral)
include "inc-depoimento.php";
include "inc-categoria-rodape.php";
include "inc-rodape.php";
?>
