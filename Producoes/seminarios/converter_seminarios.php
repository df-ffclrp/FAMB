<?php

//$handle = fopen('seminarios.json','r');

$handle = file_get_contents('seminarios.json');

//var_dump($handle);

$json_array = json_decode($handle, true);

foreach ($json_array as $item => $seminario) {
  if($seminario['Link'] == "SEM CONTEÚDO"){
    continue;
  }
  echo "<strong> {$seminario['Data']} </strong> - {$seminario['Titulo']} <br/>" . PHP_EOL;
  echo "<strong>Palestrante:</strong> {$seminario['Palestrante']}<br/>". PHP_EOL;
  echo '<a href="'. $seminario['Link'] .'" target="_blank">Assistir o vídeo</a><br/>'. PHP_EOL;
  echo "<hr>". PHP_EOL;
  // echo $seminario['Palestrante'];

}

//var_dump($json_array);
