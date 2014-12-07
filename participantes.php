<?php 

$titulo = 'participantes';

include('inc/header.php');
require_once('inc/configx.php');


?>

<div class="page-header">
	<h2>Participantes<small> Crear y modificar y borrar participantes</small></h2>
</div>

</div>

<div class="row">
	<p>
		<a href="participantes/create.php" class="btn btn-success">Crear</a>
	</p>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Puesto</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			<?php 

			include('inc/database.php');
			$pdo = Database::connect();
			$sql = 'SELECT * FROM participants ORDER BY participant_id DESC';
			foreach($pdo->query($sql) as $row) {
				echo '<tr>';
				echo '<td>'.$row['participant_id'].'</td>';
				echo '<td>'.$row['participant_type_code'].'</td>';
				echo '<td>'.$row['participant_name'].'</td>';
				echo '<td>'.$row['participant_lastname'].'</td>';
				echo '<td>'.$row['participant_email'].'</td>';
				echo '<td width=250>';
				echo '<a class="btn" href="participantes/read.php?participant_id='.$row['participant_id'].'">VER</a>';
				echo ' ';
				echo '<a class="btn btn-success" href="participantes/update.php?participant_id='.$row['participant_id'].'">Modificar</a>';
				echo ' ';
				echo '<a class="btn btn-danger" href="participantes/delete.php?participant_id='.$row['participant_id'].'">Eliminar</a>';
				echo '</td>';
				echo '<tr>';
			}
			Database::disconnect();
			?>
		</tbody>
	</table>
	<?php include('inc/footer.php'); ?>
</div>
</div> <!-- /Contenedor-->
</body>

</html>