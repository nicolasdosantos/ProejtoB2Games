<?php
session_start();
include("config.php");

if (!isset($_SESSION["usuario"])) {
    header("Location: ../html/login.html");
    exit;
}

$usuario = $_SESSION["usuario"];

$db = [];
if (file_exists($nomeArq)) {
    $txt = file_get_contents($nomeArq);
    $db = json_decode($txt, true);
}

if (isset($db[$usuario])) {
    unset($db[$usuario]);
}

file_put_contents($nomeArq, json_encode($db));

session_unset();
session_destroy();

echo "<h1>Conta excluída com sucesso!</h1>";
echo "<br><a href='../html/login.html'>Voltar ao login</a>";
?>
