<?php
    session_start();

    if (!isset($_SESSION["usuario"])) {
        header("Location: ../html/login.html");
        exit;
    }

    $html = file_get_contents("../html/perfil.html");

    $html = str_replace("NOME", $_SESSION["nome"], $html);
    $html = str_replace("EMAIL", $_SESSION["email"], $html);
    $html = str_replace("USUARIO", $_SESSION["usuario"], $html);
    $html = str_replace("SENHA", $_SESSION["senha"], $html);

    echo $html;
?>
