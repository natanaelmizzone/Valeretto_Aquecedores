<?php 
session_start();
include "admin-trava.php"; 
include "inc-cabecalho.php";
?>

<main class="container my-5">
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
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 bg-white p-5 rounded shadow-sm">
            <h1 class="text-center mb-4">Cadastrar Novo Produto</h1>

         
            <form action="produto-salvar.php" method="post"  id="formProduto">
                
    <div class="mb-3">
        <label class="form-label fw-bold" for="nome">Nome do Produto:</label>
            <select name="nome" id="nome" required class="form-select">
                 <option value="" disabled selected>Selecione um produto...</option>
                    <option value="Aquecedor a Gás">Aquecedor a Gás</option>
                    <option value="Aquecedor Solar">Aquecedor Solar</option>
                    <option value="Aquecedor Solar de Piscina">Aquecedor Solar de Piscina</option>
                    <option value="Iluminação de Piscina">Iluminação de Piscina</option>
                    <option value="Pressurizadoras">Pressurizadoras</option>
            </select>
    </div>


                <div class="mb-3">
                    <label class="form-label fw-bold">Descrição:</label>
                    <textarea type="text" name="descricao" id="descricao" required class="form-control" rows="4" placeholder="Detalhes sobre o tamanho, material, etc."></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Preço:</label>
                <div class="input-group">
                     <span class="input-group-text">R$</span>
                     <input type="text" name="preco" id="preco" required class="form-control" placeholder="0,00" step="0.01">
                </div>
</div>

                <div class="mb-3">
                    <label for="estoque" class="form-label fw-bold">Estoque Inicial (Quantidade):</label>
                    <input type="number" id="estoque" name="estoque" min="0" required class="form-control" placeholder="Ex: 10">
                    </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Imagem do Produto:</label>
                    <input type="text" name="imagem" id="imagem" required class="form-control" placeholder="https://exemplo.com/imagem.jpg">
                    <small class="text-muted">Formatos aceitos: JPG, JPEG, PNG ou WEBP.</small>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-lg">Cadastrar Produto</button>
                    <button type="reset" class="btn btn-warning btn-lg">Limpar</button>
                    <a href="pag-admin.php" class="btn btn-secondary btn-lg">Voltar</a>
                </div>
            </form>

<?php
    // 1. Verifica se o parâmetro 'mensagem' existe e foi enviado através da URL (Ex: ?mensagem=Sucesso)
    if (isset($_GET['mensagem'])) {
        
        // 2. Transforma caracteres especiais em texto comum para impedir ataques do tipo Cross-Site Scripting (XSS)
        // 3. Imprime na tela o HTML de um alerta estilizado centralizado contendo a mensagem já protegida
        echo '<div class="alert alert-info mt-3 text-center" role="alert">' . htmlspecialchars($_GET['mensagem']) . '</div>';
    }
?>

        </div>
    </div>
</main>
<script src="./src/js/script.js"></script>






