<?php

    $mascaraBi = $_GET["mascara"];
    $ultimoOc = $_GET["ultimoOcteto"];
    $primeiroOc = $_GET["primeiroOcteto"];
    $segundoOc = $_GET["segundoOcteto"];
    $terceiroOc = $_GET["terceiroOcteto"];

    function MascBinaria($mascBi){
        $expoente = (32 - $mascBi);

        return $expoente;
    }

    function QtdEnd($expoente){
        $qtdEnd = pow(2, $expoente);

        return $qtdEnd;
    }

    function QtdSubredes($qtdEnd){
        $subredes = 256 / $qtdEnd;

        return $subredes;
    }

    function MascDecimal($qtdEnd){
        $mascaraDec = 256 - $qtdEnd;

        return $mascaraDec;
    }

    function QtdHosts($qtdEnd, $masc){
        if ($masc == 31 or $masc == 32) {
            $qtdHosts = $qtdEnd - 1;
        }else{
            $qtdHosts = $qtdEnd - 2;
        }

        return $qtdHosts;
    }

    function Rede($ultimoOc, $qtdEnd){
        $rede = floor($ultimoOc / $qtdEnd) * $qtdEnd;

        return $rede;
    }

    function PrimeiroHost($rede){
        $primeiroHost = $rede + 1;

        return $primeiroHost;
    }

    function Broadcast($rede, $qtdEnd){
        $broadcast = ($rede + $qtdEnd) -1;

        return $broadcast;
    }

    function UltimoHost($broadcast){
        $ultimoHost = $broadcast - 1;

        return $ultimoHost;
    }

    function Classes($primeiroOc){
        if ($primeiroOc <= 126){
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

        return $classeIp;
    }

    function IpsPrivados($pOc, $sOc){
        if ($pOc == 169 and $sOc == 254){
            $tipo = "Privado (ZeroConf)";
        }elseif ($pOc == 127){
            $tipo = "Privado (Localhost)";
        }elseif ($pOc == 192 and $sOc == 168){
            $tipo = "Privado";
        }elseif (($pOc == 172) and ($sOc >= 16) and ($sOc <= 31)){
            $tipo = "Privado";
        }elseif ($pOc == 10){
            $tipo = "Privado";
        }else{
            $tipo = "Público";
        }

        return $tipo;
    }


    $mascaraBin = MascBinaria($mascaraBi);
    $qtdEnd = QtdEnd($mascaraBin);
    $subredes = QtdSubredes($qtdEnd);
    $mascDecimal = MascDecimal($qtdEnd);
    $qtdHosts = QtdHosts($qtdEnd, $mascDecimal);
    $rede = Rede($ultimoOc, $qtdEnd);
    $primeiro = PrimeiroHost($rede);
    $broadcast = Broadcast($rede, $qtdEnd);
    $ultimo = UltimoHost($broadcast);
    $classe = Classes($primeiroOc);
    $privateOrPublic = IPsPrivados($primeiroOc, $segundoOc);


$dados = ['qtdEnd' => $qtdEnd,
          'subredes' => $subredes,
          'mascaraDec' => $mascDecimal,
          'qtdHosts' => $qtdHosts,
          'rede' => $rede,
          'primeiro' => $primeiro,
          'ultimo' => $ultimo,
          'broadcast' => $broadcast,
          'classe' => $classe,
          'tipo' => $privateOrPublic];

header('Content-type: application/json');
echo json_encode($dados);
