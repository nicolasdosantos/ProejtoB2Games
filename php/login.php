<?php
include("config.php");

if (isset($_POST["usuario"]) && isset($_POST["senha"])) {
    
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
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
                $perfilHtml = str_replace("USUARIO", $usuarioInfo["usuario"], $perfilHtml);
                $perfilHtml = str_replace("SENHA", $usuarioInfo["senha"], $perfilHtml);

                echo $perfilHtml;
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
    echo "<h2>Nenhum dado enviado!</h2><a href='../html/login.html'>Voltar</a>";
}
?>
