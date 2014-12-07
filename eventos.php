<?php 

$titulo = 'eventos';
include('inc/header.php');
require_once('inc/configx.php');
?>
<div class="page-header">
	<h2>Eventos<small> Crear y modificar y borrar eventos</small></h2>
</div>

</div>

<div class="row">
	<p>
		<a href="eventos/create.php" class="btn btn-success">Crear</a>
	</p>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Tipo de Evento</th>
				<th>Nombre</th>
				<th>Lugar</th>
				<th>Fecha</th>
				<th>Costo de Entrada</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include('inc/database.php');
			$pdo = Database::connect();
			$sql = 'SELECT * FROM events ORDER BY event_id DESC';
			foreach($pdo->query($sql) as $row) {
				echo '<tr>';
				echo '<td>'.$row['event_id'].'</td>';
				echo '<td>'.$row['event_type_code'].'</td>';
				echo '<td>'.$row['event_name'].'</td>';
				echo '<td>'.$row['event_place'].'</td>';
				echo '<td>'.$row['event_date'].'</td>';
				echo '<td>'.$row['event_entrance_fee'].'</td>';
				echo '<td width=250>';
				echo '<a class="btn" href="eventos/read.php?event_id='.$row['event_id'].'">VER</a>';
				echo ' ';
				echo '<a class="btn btn-success" href="eventos/update.php?event_id='.$row['event_id'].'">Modificar</a>';
				echo ' ';
				echo '<a class="btn btn-danger" href="eventos/delete.php?event_id='.$row['event_id'].'">Eliminar</a>';
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