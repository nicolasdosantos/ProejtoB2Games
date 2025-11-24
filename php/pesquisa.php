<?php

    $nomeArq = "../data/historico.json";

    $entrada = json_decode(file_get_contents("php://input"), true);

    $nome = $entrada["nome"];
    $nota = $entrada["nota"];
    $lancamento = $entrada["lancamento"];
    $data = date("d/m/Y");

    $db = [];
    if (file_exists($nomeArq)) {
        $dados = file_get_contents($nomeArq);
        $db = json_decode($dados, true);
    }

    $novoJogo = [];
    $novoJogo["nome"] = $nome;
    $novoJogo["nota"] = $nota;
    $novoJogo["lancamento"] = $lancamento;
    $novoJogo["data"] = $data;

    $db[] = $novoJogo;

    $dbJson = json_encode($db, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents($nomeArq, $dbJson);

?>
