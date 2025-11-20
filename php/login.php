<?php
include("config.php");

if (isset($_REQUEST["usuario"]) && isset($_REQUEST["senha"])) {
    $usuario = $_REQUEST["usuario"];
    $senha = $_REQUEST["senha"];
    $senhaCript = md5($senha);

    if (file_exists($nomeArq)) {
        $dados = file_get_contents($nomeArq);
        $db = json_decode($dados, true);

        if (isset($db[$usuario])) {
            $usuarioInfo = $db[$usuario];

            if ($usuarioInfo["senha"] === $senhaCript) {

                
               
                $perfilHtml = file_get_contents("../html/perfil.html");


                
                $perfilHtml = str_replace("NOME", $usuarioInfo["nome"], $perfilHtml);
                $perfilHtml = str_replace("EMAIL", $usuarioInfo["email"], $perfilHtml);
                $perfilHtml = str_replace("#CEP#", $dadosCep["cep"] ?? "-", $perfilHtml);
                $perfilHtml = str_replace("LOGRADOURO", $dadosCep["logradouro"] ?? "-", $perfilHtml);
                $perfilHtml = str_replace("BAIRRO", $dadosCep["bairro"] ?? "-", $perfilHtml);
                $perfilHtml = str_replace("CIDADE", $dadosCep["localidade"] ?? "-", $perfilHtml);
                $perfilHtml = str_replace("ESTADO", $dadosCep["uf"] ?? "-", $perfilHtml);

                

                exit;

            } else {
                echo "<h2>Senha incorreta!</h2><a href='../html/login.html'>Voltar</a>";
                
            }
        } else {
            echo "<h2>Usuário não encontrado!</h2><a href='../html/login.html'>Voltar</a>";
        }
    } else {
        echo "<h2>Nenhum usuário cadastrado!</h2><a href='../html/login.html'>Cadastrar</a>";
    }
} else {
    echo "<h2>Nenhum dado foi enviado!</h2><a href='../html/login.html'>Voltar</a>";
}
?>
