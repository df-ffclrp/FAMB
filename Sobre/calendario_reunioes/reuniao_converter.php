<?php
/*
Gera tabelas formatadas dos calendários de Reunião para a pós graduação

*/


//$handle = fopen('seminarios.json','r');

// Reuniões do CCP
//$handle = file_get_contents('reunioes_famb_ccp.json');
// Reuniões do CPG
$handle = file_get_contents('reunioes_famb_cpg.json');

//var_dump($handle);

$json_array = json_decode($handle, true);

//var_dump($json_array);

foreach ($json_array as $reuniao) {
	echo "<tr>". PHP_EOL;
	echo "\t <td> {$reuniao['data']} </td>" . PHP_EOL;
	echo "\t <td> {$reuniao['dia_semana']} </td>" . PHP_EOL;
	echo "\t <td> {$reuniao['horario']} </td>" . PHP_EOL;
	echo "</tr>" . PHP_EOL;
}

//var_dump($json_array);
