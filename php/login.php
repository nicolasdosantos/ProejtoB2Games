<?php
include("config.php");
session_start();

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

                $_SESSION["usuario"] = $usuarioInfo["usuario"];
                $_SESSION["nome"] = $usuarioInfo["nome"];
                $_SESSION["email"] = $usuarioInfo["email"];
                $_SESSION["senha"] = $usuarioInfo["senha"];

                header("Location: perfil.php");
                exit;
            } else {

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


                echo "<div class='container'> <h2>Senha incorreta!</h2><a href='../html/login.html'>Voltar</a> </div>";
            }
        } else {
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
            echo "
                <div class='container'>            <h2>Usuário não encontrado!</h2><a href='../html/login.html'>Voltar</a> </div>";
        }
    } else {

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

        echo "
            <div class='container'><h2>Nenhum usuário cadastrado!</h2><a href='../html/login.html'>Cadastrar</a></div>";
    }
} else {

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

    echo "<h2>Nenhum dado enviado!</h2><a href='../html/login.html'>Voltar</a>";
}
