<?php

    $mascaraBi = 26;//$_POST["mascara"];
    $ultimoOc = 15; //$_POST["ultimoOcteto];
    $primeiroOc = 125; //$_POST["primeiroOcteto];

    $expoente = (32 - $mascaraBi); //Máscara binária (/n)

    $qtdEnd = pow(2, $expoente); //Quantidade de endereços
    echo $qtdEnd . "\n";

    $subredes = 256 / $qtdEnd; //Quantidade de sub-redes
    echo $subredes . "\n";

    $mascaraDec = 256 - $qtdEnd; //Máscara decimal
    echo $mascaraDec . "\n";

    $qtdHosts = $qtdEnd - 2; //Quantidade de hosts por sub-rede
    echo $qtdHosts . "\n";

    $IP_subrede = $subredes * (($ultimoOc / $subredes));
    echo $IP_subrede. "\n";

    $primeiroHost = ($IP_subrede + 1); //Primeiro IP válido
    echo $primeiroHost . "\n";

    $broadcast = $IP_subrede + ($subredes - 1); //Broadcast da sub-rede
    echo $broadcast . "\n";

    $ultimoHost = $broadcast - 1; //Último IP válido
    echo $ultimoHost."\n";

    if ($primeiroOc <= 127){ //Classificação das classes
    $classeIp = "Classe A";
    }elseif ($primeiroOc <= 191) {
        $classeIp = "Classe B";
    }elseif ($primeiroOc <= 223) {
        $classeIp = "Classe C";
    }elseif ($primeiroOc <= 239) {
        $classeIp = "Classe D";
    }elseif ($primeiroOc <= 255) {
        $classeIp = "Classe E";
    }else{
        $classeIp = "Informe o valor correto!";
    }
    echo $classeIp . "\n";

    





