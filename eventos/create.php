<?php
	
	include('../inc/dll.php');

	if(!empty($_POST)) {
		//Errores de validacion
		$event_id_error = null;
		$event_type_code_error = null;
		$event_name_error = null;
		$event_place_error = null;
		$event_date_error = null;
		$event_entrance_fee = null;

		//Post
		$event_id = $_POST['event_id'];
		$event_type_code = $_POST['event_type_code'];
		$event_name = $_POST['event_name'];
		$event_place = $_POST['event_place'];
		$event_date = $_POST['event_date'];
		$event_entrance_fee = $_POST['event_entrance_fee'];

		//Validaciones de entrada
		$valid = true;

		if(empty($event_id)){
			$event_id_error = 'Por favor, inserte el id';
			$valid = false;
		}

		if(empty($event_type_code)){
			$event_type_code_error = 'Por favor, inserte el tipo de participante';
			$valid = false;
		}

		if(empty($event_name)){
			$event_name_error = 'Por favor, inserte el nombre del participante';
			$valid = false;
		}

		if(empty($event_place)){
			$event_place_error = 'Por favor, inserte el apellido';
			$valid = false;
		}

		if(empty($event_entrance_fee)) {
			$event_entrance_fee_error = 'Por favor, inserte la direccion';
			$valid = false;
		}/* elseif(!filter_var($event_date,FILTER_VALIDATE_DATE)) {
			$event_date_error = 'Inserte solo numeros';
			$valid = false;
		}*/

		if(empty($event_entrance_fee)) {
			$envent_entrance_fee_error = 'Por favor, inserte la direccion';
			$valid = false;
		} elseif(!filter_var($event_entrance_fee,FILTER_VALIDATE_FLOAT)) {
			$event_entrance_fee_error = 'Inserte solo numeros';
			$valid = false;
		}

		if($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO events (event_id, event_type_code, event_name, event_place, event_date, event_entrance_fee) VALUES (?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($event_id,
				$event_type_code,
				$event_name,
				$event_place,
				$event_date,
				$event_entrance_fee
			));
			Database::disconnect();
			header("Location: ../eventos.php");
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
	<title>CREATE</title>
</head>
<body>
	<div class="container">
		<div class="span10 offset1">
			<div class="row">
				<h3>Crear Participante</h3>
			</div>

			<form class="form-horizontal" action="create.php" method="post">
				<!--*****************id*****************************-->
				<div class="control-group <?php echo !empty($event_id_error)?'error':'';?>">
					<label class="control-label">Id</label>
					<div class="controls">
						<input name="event_id" type="text" placeholder="numero de evento" value="<?php echo !empty($event_id)?$event_id:'';?>">
						<?php if(!empty($event_id_error)): ?>
							<span class="help-inline"><?php echo $event_id_error; ?></span>
						<?php endif; ?>
					</div>
				</div>
				<!--//******************Puesto*****************************/-->
				<div class="control-group <?php echo !empty($event_type_code_error)?'error':'';?>">
					<label class="control-label">Tipo de Evento</label>
					<div class="controls">
						<input name="event_type_code" type="text" placeholder="Africa, niños, etc" value="<?php echo !empty($event_type_code)?$event_type_code:'';?>">
						<?php if(!empty($event_type_code_error)): ?>
							<span class="help-inline"><?php echo $event_type_code_error; ?></span>
						<?php endif; ?>
					</div>
				</div>
				<!--//*******************MODELO*************************/-->
				<div class="control-group <?php echo !empty($event_name_error)?'error':'';?>">
					<label class="control-label">Nombre</label>
					<div class="controls">
						<input name="event_name" type="text" placeholder="Nombre" value="<?php echo !empty($modelo)?$modelo:'';?>">
						<?php if(!empty($event_name_error)): ?>
							<span class="help-inline"><?php echo $event_name_error; ?></span>
						<?php endif; ?>
					</div>
				</div>
				<!---/********************COLOR***************************/-->
				<div class="control-group <?php echo !empty($event_place_error)?'error':'';?>">
					<label class="control-label">Apellido</label>
					<div class="controls">
						<input name="event_place" type="text" placeholder="color" value="<?php echo !empty($color)?$color:'';?>">
						<?php if(!empty($event_place_error)): ?>
							<span class="help-inline"><?php echo $event_place_error; ?></span>
						<?php endif; ?>
					</div>
				</div>
				<!--/**********************FECHA**********************/-->
				<div class="control-group <?php echo !empty($event_date_error)?'error':'';?>">
					<label class="control-label">Fecha</label>
					<div class="controls">
						<input name="event_date" type="text" placeholder="30/12/2014" value="<?php echo !empty($event_date)?$event_date:'';?>">
						<?php if(!empty($event_date_error)): ?>
							<span class="help-inline"><?php echo $event_date_error; ?></span>
						<?php endif; ?>
					</div>
				</div>
				<!--/**********************PRECIO**********************/-->
				<div class="control-group <?php echo !empty($event_entrance_fee_error)?'error':'';?>">
					<label class="control-label">Precio de entrada</label>
					<div class="controls">
						<input name="event_entrance_fee" type="text" placeholder="$RD" value="<?php echo !empty($event_entrance_fee)?$event_entrance_fee:'';?>">
						<?php if(!empty($event_entrance_fee_error)): ?>
							<span class="help-inline"><?php echo $event_entrance_fee_error; ?></span>
						<?php endif; ?>
					</div>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-success">Crear</button>
					<a class="btn" href="../eventos.php">Regresar</a>
				</div>
			</form>	
		</div>
	</div> <!-- Contenedor -->
</body>
</html>