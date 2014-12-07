<?php
include('../inc/dll.php');
$id = null;
if(!empty($_GET['event_type_code'])) {
	$id = $_REQUEST['event_description'];
}

if(null == $id) {
	header("Location: ../TipoEvento.php");
} else {
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM ref_event_types where event_type_code = ?";
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
				<h3>Ver tipo de Evento</h3>
			</div>

			<div class="form-horizontal">
				<div class="control-group">
					<label class="control-label">Id</label>
					<div class="controls">
						<label class="check-box">
							<?php echo $data['event_type_code'];?>
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Descripcion</label>
					<div class="controls">
						<label class="check-box">
							<?php echo $data['event_description'];?>
						</label>
					</div>
				</div>
				
					<div>
						<div class="form-actions">
							<a class="btn" href="../TipoEvento.php">Volver</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>