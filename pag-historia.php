<!DOCTYPE html>
<html lang="pt-br">
    <?php
        include("inc-cabecalho.php");
    ?>
<body>

    <?php
        include("inc-menu.php");
        include("inc-banner.php");
        include("inc-categoria-inicio.php");
    ?>

    <main>
        <section class="about-banner py-5">
            <div class="container p-3">
                <div class="row align-items-lg-center mb-5">
                    <div class="col">
                        <h4 class="display-6 text-center fw-inter-bold text-white text-uppercase">
                            Veja como tudo
                            <span class="text-orange">começou</span>
                        </h4>
                    </div>
                </div>    
            </div>
        </section>

        <?php
            $history_info = [
                ['<b>No dia 28 de Setembro de 2001, a empresa “Valeretto Aquecedores e Acessórios”</b> foi inaugurada na Rua Florindo Cibim, 1101, em Americana. No início a empresa familiar era conhecida como AmericanSol.'],
                ['Fundada pelo Valeretto e sua esposa, Sandra, a empresa desde do seu início destacou-se no mercado pelo seu <b>elevado padrão de performance e atenção aos detalhes</b>, buscando sempre oferecer <b>soluções tecnológicas para aquecimento de água e pressurização.</b>'],
                ['A Valeretto Aquecedores e Acessórios sempre possui um <b>cuidadoso e criterioso processo de seleção de seus fornecedores e parceiros</b> para poder atender seus clientes com <b>exclusividade e eficiência</b>. e com o passar do tempo seu portfólio de produtos foi se expandindo e evoluindo.'],
                ['<b>A empresa cresceu, o time aumentou</b> e, em 2010, ela <b>ganhou um novo espaço na Avenida Nove de Julho em Americana, onde é o atual endereço, além de numa reformulação da marca, Valeretto Aquecedores e Acessórios.</b>'],
            ];
        ?>

        <section class="bg-body-tertiary py-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 g-4">
                    <?php
                        for($i = 0; $i < count($history_info); $i++) {
                    ?>
                    <div class="col">
                        <div class="history-card p-4 border-0 shadow">
                            <div class="text-muted fw-inter-medium fs-6">
                                <?php echo($history_info[$i][0])?>
                            </div>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </section>

        <?php
            $valeretto_info = [
                ['./src/img/Valeretto_empresario.jpg','Valeretto','Fundador e Proprietário','“Seja qual for o projeto é muito gratificante ver a satisfação de um cliente e saber que atendemos suas expectativas, melhorando o seu conforto através de uma proposta mais eficiente e sustentável”'],
                ['./src/img/Sandra_Valeretto_empresaria.jpg','Sandra','Fundadora e Proprietária','“Somos gratos por todos que nos ajudaram nessa jornada. Aprendemos muito e evoluímos, mas a sua essência e valores continuam assegurando sua qualidade e confiabilidade”'],
            ];
        ?>

        <section class="bg-body py-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
                    <?php
                        for($i = 0; $i < count($valeretto_info); $i++) {
                    ?>
                    <div class="col">
                        <div class="history-card p-4 border-0 shadow">
                            <div class="d-flex justify-content-center align-items-center flex-row w-100 gap-5">
                                <div class="bg-body">
                                    <div>
                                        <img src="<?php echo($valeretto_info[$i][0])?>" alt="Valeretto_empresario" class="photo-img rounded-circle">
                                    </div>
                                </div>    
                                <div>
                                    <div>
                                        <h5 class="text-orange fw-inter-semibold"><?php echo($valeretto_info[$i][1])?></h5>
                                    </div>
                                    <div>
                                        <h6 class="text-muted fw-inter-semibold"><?php echo($valeretto_info[$i][2])?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-body-secondary p-4 text-center shadow-sm mb-5">
                            <span class="fw-inter-medium"><?php echo($valeretto_info[$i][3])?></span>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>
    
    </main>

<?php
    include("inc-depoimento.php");
    include("inc-categoria-rodape.php");
    include("inc-rodape.php");
?>
    
</body>
</html>