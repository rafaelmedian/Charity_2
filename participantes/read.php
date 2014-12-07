<?php
include('../inc/dll.php');
$id = null;
if(!empty($_GET['participant_id'])) {
	$id = $_REQUEST['participant_id'];
}

if(null == $id) {
	header("Location: ../participantes.php");
} else {
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM participants where participant_id = ?";
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
				<h3>Ver participante</h3>
			</div>

			<div class="form-horizontal">
				<div class="control-group">
					<label class="control-label">Id</label>
					<div class="controls">
						<label class="check-box">
							<?php echo $data['participant_id'];?>
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Puesto</label>
					<div class="controls">
						<label class="check-box">
							<?php echo $data['participant_type_code'];?>
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Nombre</label>
					<div class="controls">
						<label class="check-box">
							<?php echo $data['participant_name'];?>
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Apellido</label>
					<div class="controls">
						<label class="check-box">
							<?php echo $data['participant_lastname'];?>
						</label>
					</div>
				</div>
				<div class="control-group">
					<div class="control-group">
						<label class="control-label">Correo Electronico</label>
						<div class="controls">
							<label class="check-box">
								<?php echo $data['participant_email'];?>
							</label>
						</div>
					</div>
					<div>
						<div class="form-actions">
							<a class="btn" href="../participantes.php">Volver</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>