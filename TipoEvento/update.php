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
			$sql = "UPDATE INTO ref_event_types SET event_type_code = ?, event_description = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($event_type_code,$event_description));
			Database::disconnect();
			header("Location: ../TipoEvento.php");
		} else {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT * FROM ref_event_types WHERE event_type_code = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($matricula));
			$data = $q->fetch(PDO::FETCH_ASSOC);
			$matricula = $data['event_type_code'];
			$marca = $data['event_description'];
			Database::disconnect();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
	<title>Modificar</title>
</head>
<body>
	<div class="container">
		<div class="span10 offset1">
			<div class="row">
				<h3>Modificar Participante</h3>
			</div>

			<form class="form-horizontal" action="create.php" method="post">
				<!--*****************id*****************************-->
				<div class="control-group <?php echo !empty($event_type_code_error)?'error':'';?>">
					<label class="control-label">Id</label>
					<div class="controls">
						<input name="event_type_code" type="text" placeholder="id" value="<?php echo !empty($event_type_code)?$event_type_code:'';?>">
						<?php if(!empty($event_type_code_error)): ?>
							<span class="help-inline"><?php echo $event_type_code_error; ?></span>
						<?php endif; ?>
					</div>
				</div>
				<!--//******************Puesto*****************************/-->
				<div class="control-group <?php echo !empty($event_description_error)?'error':'';?>">
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