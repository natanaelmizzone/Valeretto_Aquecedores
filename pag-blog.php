<!DOCTYPE html>
<html lang="pt-br">
    <?php
        // Inclui o arquivo de cabeçalho estrutural (geralmente contém as tags <head>, metas e links CSS)
        include("inc-cabecalho.php");
    ?>
<body>
    <?php
        // Inclui o arquivo do menu de navegação do site (o topo da página)
        include("inc-menu.php");
    ?>

    <main>
        <section class="bg-body-secondary py-5">
            <div class="container text-center">
                <h3 class="text-uppercase fw-inter-bold text-muted">seja bem-vindo ao nosso <b class="text-orange">blog!</b></h3>
                <p class="fw-inter-medium text-muted ">Encontre aqui respostas rápidas, guias de manutenção e dicas de economia para os sistemas de aquecimento e pressurização do seu imóvel.</p>
            </div>
        </section>

        <?php
            // Cria uma matriz (array multidimensional) contendo as informações fictícias ou estáticas dos cartões do blog
            // Cada item interno representa um post com: [0] caminho da imagem, [1] título e [2] resumo do texto
            $blog_cards_info =[
                ['./src/img/banheira_quente_a-gas-1024x576.jpg','Os 5 principais benefícios do aquecedor a gás', 'O aquecedor a gás é um ótimo investimento, pois as vantagens dessa tecnologia não se limita apenas ao conforto na hora do banho. Listamos aqui os principais benefícios. Água quente'],
                ['./src/img/cuidados_com-aquecedor_gas-768x432.jpg','Os principais cuidados com o aquecedor a gás', 'O aquecedor a gás é uma ótima opção para aquecimento de água, principalmente para quem busca conforto, praticidade e otimização de espaço. Os equipamentos atuais possuem tecnologia mais inteligentes e'],
                ['./src/img/casa_aquecedor_solar_cuidados-1024x576.jpg','Os 4 cuidados para ter um aquecedor solar eficiente durante o inverno', 'Simples cuidados que podem manter seu aquecedor eficiente durante o inverno.'],
                ['./src/img/banho_aquecedor_solar-1024x576.jpg','Quais são os benefícios de um aquecedor solar?', 'Cada vez mais o aquecedor solar está se tornando um investimento inteligente e indispensável nas casas brasileiras. E quando o assunto é benefício, o sistema solar vai muito além de'],
            ];
        ?>

        <section class="bg-body-tertiary py-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 g-4">
                    <?php
                        // Cria um laço de repetição que vai rodar enquanto o contador ($i) for menor que a quantidade total de itens no array
                        for($i = 0; $i < count($blog_cards_info); $i++) {
                    ?>
                        <div class="col">
                            <a href="#" class="card h-100 shadow-sm text-decoration-none border-0 shadow-sm hover-lift">
                                <div class="blog-card-img">
                                    <!-- Imprime na tela o caminho da imagem correspondente ao post atual [$i] -->
                                    <img src="<?php echo($blog_cards_info[$i][0])?>" class="card-img-top h-100 img-fluid" alt="">
                                </div>
                                <div class="card-body p-3 d-flex flex-column justify-content-between">
                                    <div>
                                        <!-- Imprime na tela o título do post correspondente ao post atual [$i] -->
                                        <h5 class="fw-inter-semibold mb-3 text-muted"><?php echo($blog_cards_info[$i][1])?></h5>
                                        <div class=" mb-3">
                                            <!-- Imprime na tela o resumo de texto correspondente ao post atual [$i] -->
                                            <span class="fs-7 fw-inter-regular line-clamp-4 text-muted"><?php echo($blog_cards_info[$i][2])?></span>
                                        </div>
                                        <span href="#" class="small mb-2 text-decoration-none text-orange bg-transparent">Ver mais...</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                        } // Fim do laço de repetição for
                    ?>
                </div>    
            </div>
        </section>
    </main>

    <?php
        // Inclui o arquivo do rodapé do site (fim da página com links e scripts adicionais)
        include("inc-rodape.php");
    ?>
</body>
</html>
