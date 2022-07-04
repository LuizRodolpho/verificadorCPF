<?php

verificaCpf(13769206622);

function verificaCpf($cpf)
{   //Checa se a quantidade de números está correta.
    if(strlen((string)$cpf) != 11){
        echo "CPF com quantidade de números inválida.";
        exit();
    }

    //Separa o número dado em um array
    
    $arrayCpf = array_map('intval', str_split($cpf));
    
    //Verifica se J é verdadeiro 

    $cpfJ = $arrayCpf;
    unset($cpfJ[10], $cpfJ[9]);

    $soma = 0;
    $cont = 10;

    foreach($cpfJ as $num){
        $soma += $num * $cont;
        $cont -= 1;
    }
    if ($soma % 11 ==  0 || $soma % 11 == 1){
        if ($arrayCpf[9] == 0){
            echo "O número 'J' está certo" . PHP_EOL;
        } else{
            echo "Tudo errado";
            return false;
        }
    } else {
        if ($arrayCpf[9] == (11 - ($soma % 11))){
            echo "O número 'J' está certo" . PHP_EOL;
        } else{
            echo "Tudo errado";
            return false;
        }
    }

    //Verifica se K é verdadeiro

    $soma = 0;
    $cont = 11;

    $cpfK = $arrayCpf;
    unset($cpfK[10]);
    foreach($cpfK as $num){
        $soma += $num * $cont;
        $cont -= 1;
    }
    if ($soma % 11 ==  0 || $soma % 11 == 1){
        if ($arrayCpf[10] == 0){
            echo "O número 'K' está certo" . PHP_EOL;
        } else{
            echo "Tudo errado";
            return false;
        }
    } else {
        if ($arrayCpf[10] == (11 - ($soma % 11))){
            echo "O número 'K' está certo" . PHP_EOL;
        } else{
            echo "Tudo errado";
            return false;
        }
    }
};