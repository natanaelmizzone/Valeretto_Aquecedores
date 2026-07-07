<div class="container">
    <h2 class="text-center mb-4">Nossos Produtos</h2>
    <div class="row g-4">
        <?php
        // Inclui o arquivo externo responsável por abrir a conexão com o banco de dados
        include "inc-conexao.php";

        // Verifica se existe o parâmetro 'id' na URL, converte para número inteiro ou define 0 como padrão
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        // Define o comando SQL: busca um produto específico se houver ID, caso contrário busca todos
        if ($id > 0) {
            $sql = "SELECT * FROM tb_produto WHERE id_produto = $id";
        } else {
            $sql = "SELECT * FROM tb_produto";
        }

        // Executa a consulta SQL no banco de dados utilizando a conexão estabelecida
        $resultado = mysqli_query($conexao, $sql);

        // Verifica se a consulta foi executada com sucesso
        if ($resultado) {
            // Cria um laço de repetição para ler cada linha de produto retornada do banco
            while($linha = mysqli_fetch_assoc($resultado)){
                // Armazena os dados vindos do banco de dados em variáveis locais
                $id_prod   = $linha['id_produto'];
                $nome      = $linha['nome_produto'];
                $descricao = $linha['descricao_produto'];
                $estoque   = $linha['estoque_produto'];
                // Formata o preço vindo do banco para o padrão de moeda brasileiro (Ex: 10,00)
                $preco     = number_format($linha['preco_produto'], 2, ',', '.');
                $foto      = $linha['imagem_produto'];
                
                ?>
                <div class="col-12 col-md-6 col-lg-3">
 
                    <div class="card h-100 shadow-sm border-2">
 
                        <img src="<?=$foto; ?>" alt="<?=$nome; ?>" class="card-img-top p-3" style="height: 200px; object-fit: contain;">
 
                        <div class="card-body d-flex flex-column text-center">
 
                            <h5 class="card-title text-dark"><?=$nome; ?></h5>
                           
                            <p class="card-text text-muted small flex-grow-1"><?=$descricao; ?></p>
                            <div class="mb-4">
                                <small class="text-muted">Disponível: <?php echo $estoque; ?> unidades.</small>
                            </div>
 
                            <h4 class="text-success mb-3">R$ <?=$preco; ?></h4>
                           
                            <a href="https://api.whatsapp.com/send/?phone=%2B5519988529435&text&type=phone_number&app_absent=0" class="btn btn-primary w-100" target="_blank">COMPRAR</a>
 
                        </div>
                    </div>
                </div>
 
                <?php
            } // Fim do laço while
        }else{
            // Mensagem exibida caso a consulta SQL falhe por algum erro de sintaxe ou conexão
            echo "<p class='text-center lg-3'>Erro ao buscar produtos.</p>";
        }
        // Fecha formalmente a conexão ativa com o banco de dados para liberar memória do servidor
        mysqli_close($conexao);
        ?>
    </div>
</div>
