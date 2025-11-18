<?php

    session_start();
    include("config.php");

    $usuario = $_REQUEST["usuario"];
    $senha = $_REQUEST["senha"];
    $senha = md5($senha);


    $login = "../" . $lodin;
    $ok = conferirLogin($usuario,$senha,$login);
    if($ok == true){
        $_SESSION["Logado"] = true;
        $_SESSION["usuario"] = $usuario;
        header("Location: ../html/index.html");
    };


?>