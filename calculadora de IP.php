<?php

    $ultimooc = 15;
    $expoente = (32 - 24); //informado pelo usuario

    $qtdEnd = pow(2, $expoente);

    $subredes = 256 / $qtdEnd;

    $mascaraDec = 256 - $qtdEnd;

    $qtdHosts = $qtdEnd - 2;

    $redeEncontrada = ($ultimooc / $qtdEnd) + 1 ;

    $primeiroHost = ($qtdEnd * ($redeEncontrada - 1)) + 1;


    $ultimoHost = ($primeiroHost + $qtdEnd) -3;

echo $ultimoHost."\n";

