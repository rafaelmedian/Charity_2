<?php 
	include('../inc/dll.php');
	$event_type_code = 0;
	
	if ( !empty($_GET['event_type_code'])) {
		$event_type_code = $_REQUEST['event_type_code'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$event_type_code = $_POST['event_type_code'];
		
		// borrar datos
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM ref_event_types  WHERE event_type_code = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($event_type_code));
		Database::disconnect();
		header("Location: ../TipoEvento.php");
		
	} 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Borrar un participante</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="event_type_code" value="<?php echo $event_type_code;?>"/>
					  <p class="alert alert-error">Seguro que quiere borrar el registro del participante? </p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Si</button>
						  <a class="btn" href="../TipoEvento.php">No</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>