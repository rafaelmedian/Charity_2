<?php
	include('../inc/dll.php');

	if(!empty($_POST)) {
		//Errores de validacion
		$event_type_code_error = null;
		$event_description_error = null;

		//Post
		$event_type_code = $_POST['event_type_code'];
		$event_description = $_POST['event_description'];
		

		//Validaciones de entrada
		$valid = true;

		if(empty($event_type_code)){
			$event_type_code_error = 'Por favor, inserte el id';
			$valid = false;
		}

		if(empty($event_description)){
			$event_description_error = 'Por favor, inserte el tipo de participante';
			$valid = false;
		}


		if($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO ref_event_types (event_type_code, event_description) VALUES (?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($event_type_code,
				$event_description,
				
			));
			Database::disconnect();
			header("Location: ../TipoEvento.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf8">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
	<title>CREAR</title>
</head>
<body>
	<div class="container">
		<div class="span10 offset1">
			<div class="row">
				<h3>Crear Tipo de Evento</h3>
			</div>

			<form class="form-horizontal" action="create.php" method="post">
				<!--*****************id*****************************-->
				<div class="control-group <?php echo !empty($event_type_code_error)?'error':'';?>">
					<label class="control-label">Id</label>
					<div class="controls">
						<input name="event_type_code" type="text" placeholder="id" value="<?php echo !empty($event_type_code)?$event_type_code:'';?>">
						<?php if(!empty($ref_event_type_code_error)): ?>
							<span class="help-inline"><?php echo $ref_event_type_code_error; ?></span>
						<?php endif; ?>
					</div>
				</div>
				<!--//******************Puesto*****************************/-->
				<div class="control-group <?php echo !empty($event_description)?'error':'';?>">
					<label class="control-label">Descripcion</label>
					<div class="controls">
						<input name="event_description" type="text" placeholder="Descripcion" value="<?php echo !empty($event_description)?$event_description:'';?>">
						<?php if(!empty($event_description_error)): ?>
							<span class="help-inline"><?php echo $event_description_error; ?></span>
						<?php endif; ?>
					</div>
				</div>
				
				<div class="form-actions">
					<button type="submit" class="btn btn-success">Crear</button>
					<a class="btn" href="../TipoEvento.php">Regresar</a>
				</div>
			</form>	
		</div>
	</div> <!-- Contenedor -->
</body>
</html>