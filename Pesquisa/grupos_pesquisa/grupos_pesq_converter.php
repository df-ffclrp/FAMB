<?php


$handle = file_get_contents('grupos_pesquisa.json');

//var_dump($handle);

$json_array = json_decode($handle, true);

//var_dump($json_array);

$grupo_atual = '';

foreach ($json_array as $grupo) {

    if($grupo['nome'] != $grupo_atual){
        echo "<hr>";
        echo "<h3> {$grupo['nome']} </h3>" . PHP_EOL;
        if(!empty($grupo['website'])){

            echo "<a href=\"{$grupo['website']}\" target=_blank title=\"Visitar Página do Grupo\"> Site do Grupo </a> <br> " . PHP_EOL;
        }
        //echo "Visitar página do Grupo<br>";

        echo "<strong> Docentes: </strong>";
        echo "{$grupo['docente']}";

    } else {
        echo " - {$grupo['docente']}";
    }


    $grupo_atual = $grupo['nome'];

}
