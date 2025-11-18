<?php

    include("config.php");

    $usuario = $_REQUEST["usuario"];
    $senha = $_REQUEST["senha"];
    $endereco = $_REQUEST["endereco"];
    $email = $_REQUEST["email"];
    $nome = $_REQUEST["nome"];

    $senha = md5($senha);

    $db = [];
    if(file_exists($nomeArq) ){
        $dados = file_get_contents($nomeArq);

        $db = json_decode($dados, true);

    }

    $dadosUsu = [];
    $dadosUsu['usuario'] = $usuario;
    $dadosUsu['senha'] = $senha;
    $dadosUsu['endereco'] = $endereco;
    $dadosUsu['email'] = $email;
    $dadosUsu['nome'] = $nome;


    $db["$usuario"] = $dadosUsu;
    $dbJson = json_encode($db);
     

    file_put_contents($nomeArq, $dbJson);


    echo "<h1>Dados Salvos!</h1>";
    echo "<br><br><br>";
    echo "<a href = '../html/index.html'>Logar </a>"

?>