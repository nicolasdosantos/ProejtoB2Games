<?php

include("config.php");

$usuario = $_REQUEST["usuario"];
$senha = $_REQUEST["senha"];
$email = $_REQUEST["email"];
$nome = $_REQUEST["nome"];

$senha = md5($senha);

$db = [];
if (file_exists($nomeArq)) {
    $dados = file_get_contents($nomeArq);

    $db = json_decode($dados, true);
}

$dadosUsu = [];
$dadosUsu['usuario'] = $usuario;
$dadosUsu['senha'] = $senha;
$dadosUsu['email'] = $email;
$dadosUsu['nome'] = $nome;


$db["$usuario"] = $dadosUsu;
$dbJson = json_encode($db);


file_put_contents($nomeArq, $dbJson);



echo "<style>
                body{
                    margin: 0px;
                }

                .container{
                    height: 100vh;
                    width: 100vw;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    background-color: #14213D;
                    color: white;
                    font-size: x-large;
                    margin: 0px;
                    padding: 0px;
                }


                .container a{
                    color: white;
                }
            </style> ";
echo "<div class='container'><h2>Dados salvos!</h2><a href='../html/login.html'>Logar</a> </div>";

?>