<?php
include ("connect.php");

$erro = [];

if (isset ($_POST['confirma'])) {


    //Registro dos dados
    if (!isset ($_SESSION))
        session_start ();

        foreach ($_POST as $chave => $valor) {
            $_SESSION[$chave] = $valor;
        }
    //Validação
    if (empty($_SESSION['nome']))
    $erro[] = "Preencha o nome.";


    if (empty($_SESSION['email']))
    $erro[] = "Preencha o email.";

    if (substr_count($_SESSION['email'], '@') !=1 || substr_count ($_SESSION['email'], '.') > 2 || substr_count($_SESSION['email'], '.') < 1)
    $erro[] = "Email incorreto";

    if (strlen($_SESSION['senha']) < 8 || strlen ($_SESSION ['senha']) > 16)
    $erro [] = "Senha não atende aos requisitos. Ela tem que ter no mínimo 8 e no máximo 16 caracteres.";

    if (strcmp($_SESSION['senha'], $_SESSION ['senha2']) != 0)
    $erro[] = "As senhas não estão idênticas.";
    //Inserção
    if (count ($erro) == 0) {
        $sql_code = "INSERT INTO trabalhoweb (
            nome,
            email,
            senha)
            VALUES( 
            '$_SESSION[nome]',
            '$_SESSION[email]',
            '$_SESSION[senha]'
            )";

            $confirma = $mysqli ->query ($sql_code) or die ($mysqli -> error);
            if ($confirma) {
                unset (
                    $_SESSION['nome'],
                    $_SESSION['email'],
                    $_SESSION['senha']
                );
                echo "<script> location.href='index.php'; </script>";
            }else {
                $erro [] = $confirma;
            }
    }
}
?>

   <?php if (count($erro) > 0) {
    echo "<div class = 'erro'>";
    foreach ($erro as $valor)
    echo "<p id ='erro'>$valor</p><br>";
    echo "</div>";
    }?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
    <link rel ="stylesheet" type="text/css" href="CSS/CSSCadastro.css">
</head>

<body>
    <div class="Cadastro">
    <h1 id="Cadastro">Cadastro</h1>

    <form action="" method="POST">

    <p>
        <label>Nome:</label>
        <input type="text" name="nome">
        </p>

        <p>
        <label>E-mail:</label>
        <input type="text" name="email">
        </p>

        <p>
        <label>Senha:</label>
        <input type="password" name="senha">
        </p>
        
        <p id="Confirmar">
        <label>Confirmar senha:</label>
        <input type="password" name="senha2">
        </p>
        
        
        <div  id="BotaoConfirmar">
        <p>
        <button type= "submit" name="confirma">Confirmar</button>
        </p>
    </div>
</form>
<div>


 

</body>
</html>