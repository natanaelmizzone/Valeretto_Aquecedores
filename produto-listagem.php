<?php
// Inicia ou retoma uma sessão em execução no servidor (necessário para persistir dados do usuário logado)
session_start();

// Inclui o script de segurança que trava a página e valida se o usuário está logado como administrador
include "admin-trava.php"; 

// Inclui o arquivo de cabeçalho do layout (tags iniciais do HTML, links de CSS, etc.)
include "inc-cabecalho.php";


?>
    <main class="container">
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
        <h1>Listagem de Produtos</h1>
        <div class="row mb-3">
            <div class="col">
                <a class="btn btn-success me-2" href="produto-formulario.php">Novo Produto</a>   
            </div>
        </div>

        <div class="row">
             <div class="col">
               <table class="table table-striped">
                <tr scope="row">   
                    <td scope="col fw-bold">ID</td>
                    <td scope="col fw-bold">Nome</td>
                    <td scope="col fw-bold">Descrição</td>
                    <td scope="col fw-bold">Preço</td>
                    <td scope="col fw-bold">Estoque</td>
                    <td scope="col fw-bold">Imagem Produto</td>
                    <td scope="col fw-bold">Configuração</td>
                </tr>
                <?php 
                #abrir conexão
                // Inclui o arquivo externo responsável por abrir a conexão com o banco de dados
                include "inc-conexao.php";

                #consultar os dados
                // Define o comando SQL para buscar todos os produtos de forma ordenada por nome e por preço
                $sql = "select * from tb_produto order by nome_produto, preco_produto";
                // Executa a consulta no banco de dados utilizando a conexão estabelecida
                $resultado = mysqli_query($conexao, $sql);

                #listar os dados
                // Cria um laço de repetição para ler cada linha de produto retornada do banco
                while($linha_resultado = mysqli_fetch_assoc($resultado)){
                    // Imprime a tag de abertura da linha da tabela HTML
                    echo "<tr>";
                    // Imprime a coluna com o ID do produto
                    echo "<td> {$linha_resultado['id_produto']} </td>";

                    // Imprime a coluna com o nome do produto transformado em um link para visualização detalhada
                    echo "<td> <a href='produto-visualizar.php?id={$linha_resultado['id_produto']}'> {$linha_resultado['nome_produto']} </a> </td>";

                    // Imprime as colunas com a descrição, preço, estoque e o link/caminho da imagem do produto
                    echo "<td> {$linha_resultado['descricao_produto']} </td>";
                    echo "<td> {$linha_resultado['preco_produto']} </td>";
                    echo "<td> {$linha_resultado['estoque_produto']} </td>";
                    echo "<td> {$linha_resultado['imagem_produto']} </td>";


                    // Imprime a coluna de ações com os links para excluir ou editar o produto correspondente ao ID
                    echo "<td> <a href='produto-excluir.php?id={$linha_resultado['id_produto']}'>Excluir</a>
                                <a href='produto-editar.php?id={$linha_resultado['id_produto']}'>Editar</a>
                    </td>";

                    // Imprime a tag de fechamento da linha da tabela HTML
                    echo "</tr>";
                }

                #fechar conexão
                // Fecha formalmente a conexão ativa com o banco de dados para liberar memória do servidor
                mysqli_close($conexao);
                ?>
                </table>
                             
            </div>
        </div>
    </main>
