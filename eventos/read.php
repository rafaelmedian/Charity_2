<?php
include('../inc/dll.php');
$id = null;
if(!empty($_GET['event_id'])) {
	$id = $_REQUEST['event_id'];
}

if(null == $id) {
	header("Location: ../eventos.php");
} else {
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM events where event_id = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
	<title>READ</title>
</head>
<body>
	<div class="container">
		<div class="span10 offset1">
			<div class="row">
				<h3>Ver Evento</h3>
			</div>

			<div class="form-horizontal">
				<div class="control-group">
					<label class="control-label">Id</label>
					<div class="controls">
						<label class="check-box">
							<?php echo $data['event_id'];?>
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Tipo de Evento</label>
					<div class="controls">
						<label class="check-box">
							<?php echo $data['event_type_code'];?>
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Nombre</label>
					<div class="controls">
						<label class="check-box">
							<?php echo $data['event_name'];?>
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Lugar</label>
					<div class="controls">
						<label class="check-box">
							<?php echo $data['event_place'];?>
						</label>
					</div>
				</div>
				<div class="control-group">
					<div class="control-group">
						<label class="control-label">Fecha</label>
						<div class="controls">
							<label class="check-box">
								<?php echo $data['event_date'];?>
							</label>
						</div>
					</div>
					<div class="control-group">
					<div class="control-group">
						<label class="control-label">Precio de Entrada</label>
						<div class="controls">
							<label class="check-box">
								<?php echo $data['event_price_entrance'];?>
							</label>
						</div>
					</div>
					<div>
						<div class="form-actions">
							<a class="btn" href="../eventos.php">Volver</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>