<!DOCTYPE html>

<?php
include ("connect.php");
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frutas</title>
    <link rel="stylesheet" type="text/css" href="estilojogo.css">
</head>
<body>
    <div class="container">
        <div class="palavraCerta"></div>
        
        <div class="espacoErradas">
            <h3>Letras erradas</h3>
        </div>
    </div>
    <div class="fim">
        <div class="mensagem"></div>
        <button id="btn">Voltar ao menu</button>
    </div>

    <?php
        
        $idUsuario = $_SESSION['user'];

        if (isset($_POST['pontosphp'])) {
        $pontos = $_POST['pontosphp'];
            $sql_code = "SELECT fipontos
            FROM trabalhoweb
            WHERE id = $idUsuario";
        $compara = $mysqli ->query ($sql_code) or die ($mysqli -> error);
        $resultado = $compara->fetch_assoc();
        $pontosbd = $resultado['fipontos'];

            if ($pontosbd < $pontos){
            $sql_code = "UPDATE trabalhoweb
            SET fipontos = '$pontos'
            WHERE id = $idUsuario";
        $confirma = $mysqli ->query ($sql_code) or die ($mysqli -> error);
            }

        $sql_code = "SELECT apontos, cpontos, fipontos, frpontos, ppontos
            FROM trabalhoweb
            WHERE id = $idUsuario";
        $compara = $mysqli ->query ($sql_code) or die ($mysqli -> error);
        $resultado = $compara->fetch_assoc();
                $apontosbd = $resultado['apontos'];
                $cpontosbd = $resultado['cpontos'];
                $fipontosbd = $resultado['fipontos'];
                $frpontosbd = $resultado['frpontos'];
                $ppontosbd = $resultado['ppontos'];
                $newtotal = $apontosbd + $cpontosbd + $fipontosbd + $frpontosbd + $ppontosbd;

            $sql_code = "UPDATE trabalhoweb
            SET pontos = '$newtotal'
            WHERE id = $idUsuario";
        $compara = $mysqli ->query ($sql_code) or die ($mysqli -> error);
            
        }

    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="jogofilmes.js"></script>
</body>
</html>
