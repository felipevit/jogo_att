<?php
//Checar se user está logado
if (!isset($_SESSION)) {
    session_start ();
}

 if (!isset ($_SESSION['user'])) {
die ("Acesso negado: É preciso logar antes. <p> <a href=\"index.php\"> Fazer login </a> </p>");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>MENU</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <link rel ="stylesheet" type="text/css" href="CSSmenu.css">
</head>
<body>
    <?php
        // Verifica se a pontuação foi enviada via POST
        if (isset($_POST['pontos'])) {
            $pontuacao = $_POST['pontos'];
            // Imprime a pontuação em um elemento div
            echo '<div id="pontuacao">Pontuação: ' . $pontuacao . '</div>';
        }
    ?>

<ul class= "Barra">
    <li> <a id="BotLeader" href="lista.php">Leaderboards</a></li>
    <li id="LiSair"> <a id="BotSair" href="logout.php">Sair</a> </li>
</ul>



<h id="BemV">Escolha o tema. </h>
    <div id="listabotoes">
    <div class="botoes">
    <button id="botao1">Frutas</button>
    <button id="botao2">Filmes</button>
    <button id="botao3">Animais</button>
    <button id="botao4">Países</button>
    <button id="botao5">Cores</button>
    </div>
</body>
<script src="script.js"></script>
</html>
