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

echo "<div class='container'><h1>Conta excluida! </h1><a href='../html/login.html'>Votlar ao login</a> </div>";

?>