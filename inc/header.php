
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<title>Just Charity</title>
</head>
<body>

	<div class="container">
	<div class="row">
	<div class="navbar">
		<div class="navbar-inner">
			<a class="brand" href="index.php">Just Charity</a>
			<ul class="nav">
				<li class="<?php if($titulo == 'participantes'){ echo "active"; }?>"><a href="participantes.php">Participantes</a></li>
				<li class="<?php if($titulo == 'eventos'){ echo "active"; }?>"><a href="eventos.php">Eventos</a></li>
				<li class="<?php if($titulo == 'Tipo de Evento'){ echo "active"; }?>"><a href="tipoEvento.php">Tipo de Evento</a></li>
			</ul>
		</div>
	</div>
