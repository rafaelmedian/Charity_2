
<?php 

$titulo = "Tipo de Evento";

include('inc/header.php');

require_once('inc/configx.php');
?>


<div class="page-header">
<h2>Tipos de eventos<small> Crear y modificar y borrar tipos de eventos</small></h2>
</div>

</div>

<div class="row">
	<p>
		<a href="TipoEvento/create.php" class="btn btn-success">Crear</a>
	</p>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Descripcion</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include('inc/database.php');
			$pdo = Database::connect();
			$sql = 'SELECT * FROM ref_event_types ORDER BY event_type_code DESC';
			foreach($pdo->query($sql) as $row) {
				echo '<tr>';
				echo '<td>'.$row['event_type_code'].'</td>';
				echo '<td>'.$row['event_description'].'</td>';
				echo '<td width=250>';
				echo '<a class="btn" href="TipoEvento/read.php?event_type_code='.$row['event_type_code'].'">VER</a>';
				echo ' ';
				echo '<a class="btn btn-success" href="TipoEvento/update.php?event_type_code='.$row['event_type_code'].'">Modificar</a>';
				echo ' ';
				echo '<a class="btn btn-danger" href="TipoEvento/delete.php?event_type_code='.$row['event_type_code'].'">Eliminar</a>';
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