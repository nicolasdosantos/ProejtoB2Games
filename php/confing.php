<?php

    $nomeArq = "../db/login.json";
    $form = "../html/login.html";

    function conferirLogin($usuario, $senha, $login){

        $resultado = false;

        $dados = file_get_contents($login);

        $usuarios = json_decode($dados, true);

        foreach($usuarios as $usuarioLogin => $dados){
            if($usuario != $usuarioLogin) continue;
            if($senha === $dados["senha"]){
                $resultado = true;
                break;
            }
        }

        return $resultado;
        exit;

    }


?>