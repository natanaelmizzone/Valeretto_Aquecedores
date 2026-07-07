<?php include "inc-cabecalho.php" ?>

<main class="container mt-5">
<div class="alignitem d-flex justify-content-center align-items-center mb-4">
    <a class="logo navbar-brand" href="index.php">
        <img src="./assets/img/transparent_png/cropped-Valeretto-Logo.png" alt="Inicio">
    </a>
</div>
    <div style="max-width: 400px; margin: 0 auto;">
        <h1 class="text-center mb-4 ">Administrador</h1>
        <form action="admin-validar.php" method="post">
            <div class="mb-3">
                <label>E-mail do Admin:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Senha do Admin:</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Acessar Painel</button>
            <a href="index.php" class="btn mt-1 btn-dark w-100">Voltar</a> 
        </form>

<?php
    // 1. Verifica se o parâmetro 'mensagem' existe e foi enviado através da URL (Ex: ?mensagem=Sucesso)
    if (isset($_GET['mensagem'])) {
        
        // 2. Transforma caracteres especiais em texto comum para impedir ataques do tipo Cross-Site Scripting (XSS)
        // 3. Imprime na tela o HTML de um alerta formatado contendo a mensagem já protegida
        echo '<div class="mt-3 w-100" style="max-width: 400px;" role="alert">' . htmlspecialchars($_GET['mensagem']) . '</div>';
    }
?>

        
    </div>
</main>


