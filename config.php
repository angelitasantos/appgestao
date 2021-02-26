<?php

session_start();
date_default_timezone_set('America/Sao_Paulo');

// Definir os caminhos para o site / painel
define('INCLUDE_PATH', 'http://localhost/appgestao/');
define('INCLUDE_PATH_PAINEL', INCLUDE_PATH . 'painel/');

define('BASE_DIR_PAINEL', __DIR__ . '/painel');

//Conectar com banco de dados!
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'projetophp');

//Definir constantes do Painel de Controle
define('NOME_NEGOCIO', 'SanLis Gestão');

?>