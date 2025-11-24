<?php
session_start();
include("config.php");

if (!isset($_SESSION["usuario"])) {
    header("Location: ../html/login.html");
    exit;
}

$atual = $_SESSION["usuario"];

$novoUsuario = $_REQUEST["usuario"];
$novoNome = $_REQUEST["nome"];
$novoEmail = $_REQUEST["email"];
$novaSenha = $_REQUEST["senha"];

if ($novaSenha == "") {
    $novaSenha = $_SESSION["senha"];
} else {
    $novaSenha = md5($novaSenha);
}

$db = [];
if (file_exists($nomeArq)) {
    $txt = file_get_contents($nomeArq);
    $db = json_decode($txt, true);
}

if ($novoUsuario != $atual) {
    unset($db[$atual]);
}

$dados = [];
$dados["usuario"] = $novoUsuario;
$dados["nome"] = $novoNome;
$dados["email"] = $novoEmail;
$dados["senha"] = $novaSenha;

$db[$novoUsuario] = $dados;
file_put_contents($nomeArq, json_encode($db));

$_SESSION["usuario"] = $novoUsuario;
$_SESSION["nome"] = $novoNome;
$_SESSION["email"] = $novoEmail;
$_SESSION["senha"] = $novaSenha;

header("Location: perfil.php");
exit;
?>