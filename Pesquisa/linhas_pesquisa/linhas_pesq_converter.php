<?php


$handle = file_get_contents('linhas_pesquisa.json');

//var_dump($handle);

$json_array = json_decode($handle, true);

// Array que irá receber e agrupar as linhas de pesquisa
$grupos_pesq = array();

/*
Agrupa todas as linhas de pesquisa por grupo (Física Médica, Biologia Molecular, etc...)

Gera um array tridimensional separando as grandes linhas de pesquisa, contando suas linhas secundárias
e os docentes de cada linha
*/
foreach ($json_array as $item) {
    $grupo = $item['grupo_linha'];

    //Se não existe um grupo, adiciona mais um ao array com a chave sendo o nome do grupo
    if(!isset($grupos_pesq[$grupo])){
        $grupos_pesq[$grupo] = [];
    }
    // Removendo redundância
    unset($item['grupo_linha']);
    //Finalmente adiciona uma linha de pesquisa e seus docentes pertencentes àquele grupo
    $grupos_pesq[$grupo][] = $item;

}

//var_dump($grupos_pesq);

// Varre o array de grupos de pesquisa e monta o HTML para cada grupo e suas linhas de pesquisa
foreach ($grupos_pesq as $grupo => $info) {

    echo "<h2>" . $grupo . "</h2>"  . PHP_EOL;

    //var_dump($info);

    $linha_atual = '';
    foreach ($info as $valor) {

        //Controla as linhas de pesquisa na iteração para mostrar apenas os docentes
        // Responsáveis por aquela linha
        if ($valor['nome_linha'] != $linha_atual){

            //echo <p>;
            echo "<h3>" . $valor['nome_linha'] . '</h3> '  . PHP_EOL;
        }

        echo "<strong> Docente: </strong> " . $valor['docente'] .
        " - <a href={$valor['lattes']} target=_blank title=\"Ver Currículo Lattes\"> Lattes </a>" . PHP_EOL . PHP_EOL;


        // Guarda a linha atual para a pŕoxima iteração do foreach
        $linha_atual = $valor['nome_linha'];
    }
    //echo "</p>"  . PHP_EOL . PHP_EOL;

}
