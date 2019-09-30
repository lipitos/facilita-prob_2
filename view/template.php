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
    	<link rel="stylesheet" href="src/css/site.css">    	
		<link rel="stylesheet" href="src/css/bootstrap.css">
	</head>
	<body>
		<ul id="nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="index.php?view=addLeasing">Cadastrar</a></li>
			<li><a href="index.php?view=listLeasings">Listar</a></li>			
		</ul>
		<div class="container">
			<?php
                if($_GET){
					if(isset($_GET['aviso']) && !empty($_GET['aviso'])){
						$aviso = $_GET['aviso'];
					}else{
						$aviso = '';
					}
					
					if($aviso == 'ok'){
						echo '<div class="alert alert-success" role="alert">Registro cadastrado com sucesso.</div>'; 
					}
                    $view = $_GET['view'];
                    include $view. '.php';
                }else{
                    include "listLeasings.php";
                }
			?>
		</div>
		<div id="footer"><small><?php echo date('Y'); ?> - todos os direitos reservados</small></div>		
	</body>
</html>