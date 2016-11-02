<?php 

require("PHP_debug.class.php");

$var = new PHP_debug();

// simple string
$var_test = 'variavevel_teste';
$var->debug($var_test, 'nome');

// int
$var->debug(12345, "name of var");

// array
$array = array('jujuba' => 'doce' , 'cafe'=> 'quente', 'carro' => 'sou pobre', 'sem chave' );
$var->debug($array);


// Class
$var -> debug($var);





?>