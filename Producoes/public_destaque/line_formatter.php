<?php

/*
Formatador de linhas


Gera linhas formatadas em parágrafo para serem adicionadas na página devida
*/

$file_handle = fopen('publi_destaque.txt', 'r');

/*$line = fgets($file_handle);
var_dump($line);*/

while (($line = fgets($file_handle)) !== false) {

	echo "<p>\n {$line}</p>" . PHP_EOL;
}
