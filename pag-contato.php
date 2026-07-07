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

    <section class="contact-section bg-body-secondary">
        <h4 class="text-muted text-uppercase text-center fw-inter-bold mb-5">Como prefere falar conosco?</h4>
        <div class="contact-form container">
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="bg-white rounded-3 overflow-hidden p-5">
                        <h4 class="text-muted text-uppercase fw-inter-bold"><b class="text-orange">Fale conosco</b></h4>
                        <p class="text-muted fw-inter-regular mb-5">Preencha o formulário abaixo e responderemos brevemente.</p>

                        <form action="https://formsubmit.co/jorgegabriel.dev@gmail.com" id="formContato" method="POST">
                            <div class="mb-3">
                                <label class="form-label text-muted" for="contact-name">Nome</label>
                                <input type="text" name="contact-name" id="contact-name" class="form-control fw-inter-regular" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted" for="contact-email">Email</label>
                                <input type="email" name="contact-email" id="contact-email" class="form-control fw-inter-regular" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-muted" for="contact-message">Mensagem</label>
                                <textarea name="contact-message" id="contact-message" rows="4" class="message-box form-control fw-inter-regular" required></textarea>
                            </div>
                            <input type="hidden" name="_captcha" value="false">
                            <input type="hidden" name="_next" value="http://localhost:8000/pages/contato/index.php">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>

                    </div>    
                </div>
                <div class="col-lg-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1839.9427070720656!2d-47.340255!3d-22.7325!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c89bb794e7cee5%3A0xe745b4831aff6169!2sAv.%2009%20de%20Julho%2C%201061%20-%20Jardim%20Sao%20Domingos%2C%20Americana%20-%20SP%2C%20Brasil!5e0!3m2!1spt-BR!2sus!4v1782614523219!5m2!1spt-BR!2sus" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" class="w-100 h-100 rounded-2"></iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-cards py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-3">
                    <div class="contact-card card text-center border-0 shadow p-3 my-3">
                        <div>
                            <i class="bi bi-whatsapp fs-1 text-orange"></i>
                        </div>
                        <div class="card-body">
                            <span class="card-text fs-7 fw-inter-regular text-muted">(19) 9 9629-4625</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="contact-card card text-center border-0 shadow p-3 my-3">
                        <div>
                            <i class="bi bi-telephone-fill fs-1 text-orange"></i>
                        </div>
                        <div class="card-body">
                            <span class="card-text fs-7 fw-inter-regular text-muted">(19) 3405-9681</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="contact-card card text-center border-0 shadow p-3 my-3">
                        <div>
                            <i class="bi bi-geo-alt-fill fs-1 text-orange"></i>
                        </div>
                        <div class="card-body">
                            <span class="card-text fs-7 fw-inter-regular text-muted">Rua Nove de Julho, 1061
                            Jardim São Domingos - Americana/SP
                            CEP: 13471-140</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="contact-card card text-center border-0 shadow p-3 my-3">
                        <div>
                            <i class="bi bi-clock-fill fs-1 text-orange"></i>
                        </div>
                        <div class="card-body">
                            <span class="card-text fs-7 fw-inter-regular text-muted">Seg - Quinta: 7:30 - 17:30
                            Sexta: 7:30 - 16:00 Sábado: somente com agendamentos</span>
                        </div>
                    </div>
                </div>
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