<?php

    //Lista de entregas (em horas)
    $entregas = ['A' => 3, 'B' => 5, 'C' => 2, 'D' => 4, 'E' => 1,
                'F' => 6, 'G' => 3, 'H' => 5, 'I' => 2, 'J' => 7];

    $limite = 8;         // Limite de horas por caminhão
    $caminhoes = [];     // Armazena as entregas de cada caminhão
    $horasUsadas = [];   // Guarda o total de horas de cada caminhão

    //Ordena entregas da maior para a menor duração
    arsort($entregas); // Mantém chaves e ordena pelos valores (decrescente)

    //Distribui de forma otimizada
    foreach($entregas as $nome => $duracao){

        $alocado = false;

        //Tenta colocar no primeiro caminhão disponível
        foreach($horasUsadas as $i => $total){

            if($total + $duracao <= $limite){
                $caminhoes[$i][] = $nome;
                $horasUsadas[$i] += $duracao;
                $alocado = true;
                break;
            }

        }

        //Se não couber em nenhum caminhão, cria um novo
        if(!$alocado){
            $novo = count($caminhoes);
            $caminhoes[$novo][] = $nome;
            $horasUsadas[$novo] = $duracao;
        }
    }

    //Exibe o resultado
    foreach($caminhoes as $id => $lista){
        echo "Caminhão " . ($id + 1) . ": " . implode(", ", $lista) . " (". $horasUsadas[$id] . "h usadas) \n";
    }

?>
