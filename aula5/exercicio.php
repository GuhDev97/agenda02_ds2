<?php
    $n = isset($_GET['num']) ?$_GET['num'] :0;
    $o = isset($_GET['operacao']) ?$_GET['operacao'] :0;
    switch($o){
        case 1:
            $r = $n * 2;
            break;
        case 2:
            $r = $n ^ 3;
            break;
        case 3:
            $r = sqrt($n);
    }

    echo "O resultado da operação solicitada é: $r";

    <a href="index.html">Voltar</a>