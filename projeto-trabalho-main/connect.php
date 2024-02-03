<?php
//Conexão
$user = 'root';
$senha = '';
$db = 'trabalhoweb';
$host = 'localhost';

$mysqli = new mysqli($host, $user, $senha, $db);

if ($mysqli -> error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}
?>