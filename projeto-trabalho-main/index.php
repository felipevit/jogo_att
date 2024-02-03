<?php
include ("connect.php");

session_start();

if (isset($_POST['email']) || isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0) {
        echo '<p id="Erro">Preencha o e-mail.</p>';
        } else if (strlen ($_POST ['senha']) == 0) {
            echo '<p id="Erro">Preencha a senha.</p>';
            } else {
            $email = $mysqli->real_escape_string($_POST['email']);
            $pass = $mysqli->real_escape_string($_POST['senha']);
            
            $sql_code = "SELECT * FROM trabalhoweb WHERE email = '$email' AND senha = '$pass'";
            $sql_query = $mysqli->query($sql_code) or die ("Falha de cód SQL: " . $mysqli->error);

            $quant = $sql_query->num_rows;
            if ($quant == 1) {
                $usuario = $sql_query->fetch_assoc ();

                if (!isset ($_SESSION)) {
                    session_start ();

                }
                $_SESSION['user'] = $usuario['id'];
                $_SESSION['name'] = $usuario['nome'];

                header ("Location: menu.php");

            } else {
                echo ('<p id="Erro"> Email ou senha incorretos.</p>');
            }
        }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
    <link rel ="stylesheet" type="text/css" href="CSS/CSSlogin.css">
</head>

<body>
    <div class="principal">
        <?php
        if (isset($_GET['p'])) {
            $pagina = $_GET['p'].".php";

            if (is_file("$pagina")) {
            include("$pagina");
            } else {
            include ("404.php");
            }

        }

        ?>
        </div>
        <div class="Login">
    <h1 id="Entrar">Entrar</h1>

    <form action="" method="POST">

    <div class="Campos">
        <form>
        <p>
        <label id ="Email">E-mail:</label>
        <input type="text" name="email">
        </p>

        <p>
        <label id="Senha">Senha:</label>
        <input type="password" name="senha">
        </p>
    </form>

    
    <div id="Entrada">
        <p>
        <button type= "submit">Entrar</button>
        </p>
    </div>
        <div id="NaoEsta">
        <p>Não está cadastrado? <a href="Cadastro.php">Cadastre aqui!</a></p>
    </div>
    </div>
</form>
</body>
</html>