<?php 
// Inclui o arquivo de proteção que verifica se o administrador está logado antes de carregar a página
include "admin-trava.php"; 

// Inclui o arquivo contendo a estrutura do cabeçalho HTML da página (tags head, nav, estilos, etc.)
include "inc-cabecalho.php"; 

// Inclui o arquivo de conexão com o banco de dados MySQL para permitir a execução de consultas
include "inc-conexao.php";

?>

<main class="container mt-5">

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

    <!-- ====================  LISTAGEM DE PRODUTOS ==================== -->
    <div class="card shadow-sm mb-5">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
            <h5 class="mb-0 fw-bold">Listagem de Produtos</h5>
            <a class="btn btn-success btn-sm px-3 fw-bold" href="produto-formulario.php">Novo Produto</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>   
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Estoque</th>
                            <th>Imagem Produto</th>
                            <th>Configuração</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Define a instrução SQL para selecionar todas as colunas de produtos ordenados por nome e depois pelo preço
                        $sql_produtos = "SELECT * FROM tb_produto ORDER BY id_produto ASC";
                        // Executa a consulta SQL de listagem de produtos utilizando a conexão ativa com a base de dados
                        $resultado_produtos = mysqli_query($conexao, $sql_produtos);

                        // Confirma se a busca gerou resultados válidos e encontrou ao menos um produto no banco de dados
                        if ($resultado_produtos && mysqli_num_rows($resultado_produtos) > 0) {
                            // Inicia o laço de repetição extraindo linha por linha do resultado como uma matriz associativa de produtos
                            while ($linha_resultado = mysqli_fetch_assoc($resultado_produtos)) {
                                // Imprime a tag HTML de abertura da linha do produto na tabela
                                echo "<tr>";
                                // Imprime a célula com o ID do produto protegido por escape HTML seguro
                                echo "<td>" . htmlspecialchars($linha_resultado['id_produto']) . "</td>";
                                
                                // Nome com link para visualização
                                // Imprime o nome do produto envelopado em uma tag de link para a página de detalhes, tratando os dados com segurança
                                echo "<td><a class='fw-bold text-decoration-none' href='produto-visualizar.php?id=" . htmlspecialchars($linha_resultado['id_produto']) . "'>" . htmlspecialchars($linha_resultado['nome_produto']) . "</a></td>";
                                
                                // Imprime a descrição do produto com filtragem de caracteres especiais
                                echo "<td>" . htmlspecialchars($linha_resultado['descricao_produto']) . "</td>";
                                
                                // Formatação básica de moeda para exibição
                                // Imprime o valor monetário formatado com vírgula para centavos e ponto para milhares no formato padrão brasileiro
                                echo "<td>R$ " . number_format($linha_resultado['preco_produto'], 2, ',', '.') . "</td>";
                                
                                // Imprime a quantidade atual do produto em estoque de maneira sanitizada
                                echo "<td>" . htmlspecialchars($linha_resultado['estoque_produto']) . "</td>";
                                // Imprime o caminho ou nome do arquivo de imagem do produto de maneira sanitizada
                                echo "<td>" . htmlspecialchars($linha_resultado['imagem_produto']) . "</td>";

                                // Imprime o bloco contendo os links de ação de edição e exclusão contendo um aviso javascript de confirmação de exclusão
                                echo "<td>
                                    <div class='d-flex gap-2'>
                                        <a href='produto-editar.php?id=" . htmlspecialchars($linha_resultado['id_produto']) . "' class='btn btn-primary btn-sm px-2'>Editar</a>
                                        <a href='produto-excluir.php?id=" . htmlspecialchars($linha_resultado['id_produto']) . "' class='btn btn-danger btn-sm px-2' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                                    </div>
                                </td>";

                                // Imprime o encerramento da linha corrente do produto na tabela
                                echo "</tr>";
                            } // Fim do loop while de listagem dos produtos
                        // Se o retorno da tabela de produtos do banco de dados estiver completamente sem registros
                        } else {
                            // Imprime uma linha padrão informando o lojista de que a listagem de produtos está vazia
                            echo "<tr><td colspan='7' class='text-center text-muted py-3'>Nenhum produto cadastrado ainda.</td></tr>";
                        } // Fim da estrutura condicional de validação de registros de produtos
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php 
// Encerra oficialmente a conexão aberta com o banco de dados MySQL para liberar recursos do servidor de hospedagem
mysqli_close($conexao);
?>
