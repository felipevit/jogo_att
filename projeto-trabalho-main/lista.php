<!DOCTYPE html>

<?php
include ("connect.php");
session_start();
?>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" type="text/css" href="lista.css">
    <title>Log-in</title>
</head>
<body>
<div class="container">
    <button><a href="menu.php" class="VoltaMenu">Voltar ao menu</button></a>
<h1>Listagem de Resultados</h1>

<form action="" method="get">
    <label for="ordenarPor">Ordenar por:</label>
    <select name="ordenarPor" id="ordenarPor">
        <option value="pontos" <?php echo (isset($_GET['ordenarPor']) && $_GET['ordenarPor'] == 'pontos') ? 'selected' : ''; ?>>Total</option>
        <option value="nome" <?php echo (isset($_GET['ordenarPor']) && $_GET['ordenarPor'] == 'nome') ? 'selected' : ''; ?>>Nome</option>
        <option value="apontos" <?php echo (isset($_GET['ordenarPor']) && $_GET['ordenarPor'] == 'apontos') ? 'selected' : ''; ?>>Animais</option>
        <option value="cpontos" <?php echo (isset($_GET['ordenarPor']) && $_GET['ordenarPor'] == 'cpontos') ? 'selected' : ''; ?>>Cores</option>
        <option value="fipontos" <?php echo (isset($_GET['ordenarPor']) && $_GET['ordenarPor'] == 'fipontos') ? 'selected' : ''; ?>>Filmes</option>
        <option value="frpontos" <?php echo (isset($_GET['ordenarPor']) && $_GET['ordenarPor'] == 'frpontos') ? 'selected' : ''; ?>>Frutas</option>
        <option value="ppontos" <?php echo (isset($_GET['ordenarPor']) && $_GET['ordenarPor'] == 'ppontos') ? 'selected' : ''; ?>>Paises</option>
    </select>

    <label for="ordem">Ordem:</label>
    <select name="ordem" id="ordem">
        <option value="desc" <?php echo (isset($_GET['ordem']) && $_GET['ordem'] == 'desc') ? 'selected' : ''; ?>>Descendente</option>
        <option value="asc" <?php echo (isset($_GET['ordem']) && $_GET['ordem'] == 'asc') ? 'selected' : ''; ?>>Ascendente</option>
    </select>

    <input type="submit" value="Ordenar">
</form>


<?php

$ordenarPor = isset($_GET['ordenarPor']) ? $_GET['ordenarPor'] : 'id';
$ordem = isset($_GET['ordem']) ? $_GET['ordem'] : 'asc';
$colunasPermitidas = ['apontos', 'cpontos', 'fipontos', 'frpontos', 'ppontos', 'nome', 'pontos'];

$sql_code = "SELECT apontos, cpontos, fipontos, frpontos, ppontos, nome, pontos FROM trabalhoweb ORDER BY $ordenarPor $ordem";
$compara = $mysqli->query($sql_code) or die($mysqli->error);

$resultados = array();

$x = 0;
while ($linha = $compara->fetch_assoc()) {
    $resultados[] = $linha;
}

echo "<table class='result-table'>";
echo "<tr class='cabecalhos'>";
echo "<th>Posição</th>";
echo "<th>Nome</th>";
echo "<th>Total</th>";
echo "<th>Animais</th>";
echo "<th>Cores</th>";
echo "<th>Filmes</th>";
echo "<th>Frutas</th>";
echo "<th>Paises</th>";
echo "</tr>";

$nomeUsuario = $_SESSION['name'];
$posicaoDoUsuario = array_search($nomeUsuario, array_column($resultados, 'nome')) + 1;
?>

<div class="Uinfo">
    <p>Sua posição : <?php echo $posicaoDoUsuario; ?></p>
</div>
    
 <?php
$x = 0;
foreach (array_slice($resultados, 0, 20) as $item) {
    $x++;
    echo "<tr class='result-row'>";
    echo "<td>$x</td>";
    echo "<td>{$item['nome']}</td>";
    echo "<td>{$item['pontos']}</td>";
    echo "<td>{$item['apontos']}</td>";
    echo "<td>{$item['cpontos']}</td>";
    echo "<td>{$item['fipontos']}</td>";
    echo "<td>{$item['frpontos']}</td>";
    echo "<td>{$item['ppontos']}</td>";
    echo "</tr>";
}
echo "</table>";

?>
</div>
</body>
</html>
