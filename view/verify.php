<?php

require "../model/ModelLeasing.php";
require "../model/Leasing.php";
require "../config/conn.php";
require "../utils/utils.php";

$leasing = new Leasing();
$leasing_model = new ModelLeasing($pdo);

$id = $_GET['id'];

if(isset($id) && !empty($id)){
    $leasing = $leasing_model->search_leasing($id);
}
?>
<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<title>Facilita - Problema 2</title>
		<link rel="shortcut icon" href="../src/img/favicon.png">
		<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
		<link rel="stylesheet" href="/resources/pnotify/pnotify.custom.min.css">    
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">    
    	<link rel="stylesheet" href="../src/css/site.css">    	
		<link rel="stylesheet" href="../src/css/bootstrap.css">
	</head>
	<body>
		<ul id="nav">
			<li><a href="../index.php">Home</a></li>
			<li><a href="../index.php?view=addLeasing">Cadastrar</a></li>
			<li><a href="../index.php?view=listLeasings">Listar</a></li>			
		</ul>
		<div class="container">
            <div class="jumbotron">
            <h1 class="display-4"><?php echo convertBook($leasing->getId_Book()); ?></h1>
            <p class="lead"Tipo: ><?php echo convertType($leasing->getId_Type()); ?></p>
            <hr class="my-4">
            <p>Data de devolução: <?php echo date_form($leasing->getDate()); ?></p>
            <a class="btn btn-secondary" href="../index.php">Voltar</a>
            </div>
        </div>
		<div id="footer"><small><?php echo date('Y'); ?> - todos os direitos reservados</small></div>		
	</body>
</html>