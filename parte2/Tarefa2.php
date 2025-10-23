<?php

//Cada caminhão faz 4 km por litro
$km_por_litro = 4;

//Combustivel diario: 25 litros
$combustivel_inicial = 25;

//Lista de entregas e suas distâncias
$entregas = ["A" => 20, "B" => 50, "C" => 32, "D" => 12, "E" => 80];

// 1. Quais entregas podem ser feitas com o tanque cheio?

//Quantos km o caminhão pode percorrer com 25 litros
$autonomia = $combustivel_inicial * $km_por_litro;

//Armazena entregas possíveis
$possiveis = [];

foreach ($entregas as $entrega => $distancia) {
    if ($distancia <= $autonomia) {
        $possiveis[] = $entrega;
    }
}

// 2. Quantos litros adicionais seriam necessários para fazer todas as entregas ---

//Soma total das distâncias
$total_distancia = array_sum($entregas);

//Quantos litros são necessários para todas
$total_litros_necessarios = $total_distancia / $km_por_litro;

//Calcula litros adicionais além dos 25 litros
$litros_adicionais = $total_litros_necessarios - $combustivel_inicial;

//Exibe os resultados
echo "Resultados ";
echo "Autonomia com tanque cheio: {$autonomia} km \n";
echo "1. Entregas possíveis com tanque cheio (individuais): " . implode(", ", $possiveis) . "\n";
echo "2. Litros adicionais necessários para todas as entregas: " . round($litros_adicionais, 2) . " litros \n";

?>