<?php 
	include('../inc/dll.php');
	$participant_id = 0;
	
	if ( !empty($_GET['participant_id'])) {
		$participant_id = $_REQUEST['participant_id'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$participant_id = $_POST['participant_id'];
		
		// borrar datos
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM participants  WHERE participant_id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($participant_id));
		Database::disconnect();
		header("Location: ../participantes.php");
		
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
	    			  <input type="hidden" name="participant_id" value="<?php echo $participant_id;?>"/>
					  <p class="alert alert-error">Seguro que quiere borrar el registro del participante? </p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Si</button>
						  <a class="btn" href="../participantes.php">No</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>