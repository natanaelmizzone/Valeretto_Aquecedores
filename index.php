<?php
// OBRIGATÓRIO: Inicia a sessão para o site saber que você logou
session_start();
?>

<?php 

//------------------------------------ Cabeçalho----------------------------------------------



include "inc-cabecalho.php";

//------------------------------------ Menu inicial--------------------------------------------


include "inc-menu.php";


//------------------------------------------- Banner-------------------------------------------

include "inc-banner.php";

//------------------------------------ Categorias de Produtos----------------------------------


include "inc-categoria-inicio.php"; 



//-------------------------------------------- Produtos----------------------------------------


include "inc-main.php";

//-------------------------------------------- Depoimentos dos Clientes-------------------------


include "inc-depoimento.php";


//-------------------------------------------- Parceiros----------------------------------------



include "inc-categoria-rodape.php";



//-------------------------------------------- Footer--------------------------------------------


include "inc-rodape.php";
?>