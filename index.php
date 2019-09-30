<?php

require __DIR__ . "/config/conn.php";
require __DIR__ . "/utils/utils.php";
require __DIR__ . "/model/ModelBook.php";
require __DIR__ . "/model/Book.php";
require __DIR__ . "/model/ModelType.php";
require __DIR__ . "/model/Type.php";
require __DIR__ . "/model/ModelLeasing.php";
require __DIR__ . "/model/Leasing.php";

$leasing_model = new ModelLeasing($pdo);
$book_model = new ModelBook($pdo);
$type_model = new ModelType($pdo);

$router = "leasing";

if(array_key_exists("router", $_GET)){
	$router = (string) $_GET["router"];
}

if(is_file("controller/{$router}.php")){
	require "controller/{$router}.php";
}else{
	echo "Rota não encontrada";
}