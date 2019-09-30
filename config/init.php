<?php
/* Informa o nível dos erros que serão exibidos */
error_reporting(E_ALL);
 
/* Habilita a exibição de erros */
ini_set("display_errors", 1);

//timezone
date_default_timezone_set('America/Sao_Paulo');

// conexão com o banco de dados
define("BD_DSN", "mysql:dbname=facilita;host=localhost");
define('BD_SERVER','localhost');
define('BD_USER','root');
define('BD_PASS','');
define('BD_NAME','facilita');