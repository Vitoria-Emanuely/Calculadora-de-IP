<?php

//    $mascaraBi = $_GET["mascara"];
//    $ultimoOc = $_GET["ultimoOcteto"];
//    $primeiroOc = $_GET["primeiroOcteto"];
//    $segundoOc = $_GET['sedundoOcteto'];
//    $terceiroOc = $_GET['terceiroOcteto'];
$mascBi = 24;
$ultimoOc = 191;
$primeiroOc = 162;
$segundoOc = 10;
$terceiroOc = 101;

    function MascBinaria($mascBi){
        $expoente = (32 - $mascBi);

        return $expoente;
    }

    function QtdEnd($expoente){   //Quantidade de endereços
        $qtdEnd = pow(2, $expoente);

        return $qtdEnd;
    }

    function QtdSubredes($qtdEnd){     //Quantidade de sub-redes
        $subredes = 256 / $qtdEnd;

        return $subredes;
    }

    function MascDecimal($qtdEnd){    //Máscara decimal
        $mascaraDec = 256 - $qtdEnd;

        return $mascaraDec;
    }

    function QtdHosts($qtdEnd){   //Quantidade de hosts por sub-rede
        $qtdHosts = $qtdEnd - 2;

        return $qtdHosts;
    }

    function IPsubrede($subredes, $ultimoOc){
        $IP_subrede = $subredes * (($ultimoOc / $subredes));

        return $IP_subrede;
    }

    function PrimeiroHost($IP_subrede){
        $primeiroHost = ($IP_subrede + 1);

        return $primeiroHost;
    }

    function Broadcast($IP_subrede, $subredes){
        $broadcast = $IP_subrede + ($subredes - 1);

        return $broadcast;
    }

    function UltimoHost($broadcast){
        $ultimoHost = $broadcast - 1;

        return $ultimoHost;
    }

    function Classes($primeiroOc){
        if ($primeiroOc <= 127){
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

    function IPsPrivados(){

    }


    $mascaraBin = MascBinaria($mascBi);
    $qtdEnd = QtdEnd($expoente);
    $subredes = QtdSubredes($qtdEnd);
    $MascDecimal = MascDecimal($qtdEnd);
    $qtdHosts = QtdHosts($qtdEnd);
    $ipSub = IPsubrede($subredes, $ultimoOc);
    $primeiro = PrimeiroHost($IP_subrede);
    $ultimo = UltimoHost($broadcast);
    $broadcast = Broadcast($IP_subrede, $subredes);
    $classe = Classes($primeiroOc);


    //echo "<p>".$mascaraBin."</p>";

$dados = ['mascaraBin' => $mascaraBin,
          'qtdEnd' => $qtdEnd,
          'subredes' => $subredes,
          ''];



header('Content-type: application/json');
echo json_encode($dados);



    





