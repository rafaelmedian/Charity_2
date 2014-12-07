<?php
$titulo = 'instalador';
include('inc/header.php');
//require_once('inc/config.php');

/**function noError($nunError, $desc, $file, $linea, $datos){
	//echo "Ocurrio un error en el archivo {$file} en la linea {$linea} <br/>";
}set_error_handler("noError");*/

$DB_HOST = "";
$DB_USER = "";
$DB_PASS = "";
$DB_NAME = "";
$mensaje = "";
if($_POST) {
	$p = $_POST;
	$link = new PDO("mysql:host=" . $p['DB_HOST'] . ";dbname=" . $p['DB_NAME'] , $p['DB_USER'],$p['DB_PASS']);
	//$db = new PDO("mysql:host=localhost;dbname=testdb", "testusr", "secretpass");
	//new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME .";port=" . DB_PORT,DB_USER,DB_PASS);
	extract($_POST);

	//var_dump($_POST);
	//var_dump($link);
	//var_dump(isset($link));

	if(isset($link)) {

		$sql = 'CREATE TABLE `events` (
			`event_id` varchar(45) NOT NULL,
			`event_type_code` varchar(45) DEFAULT NULL,
			`event_name` varchar(45) DEFAULT NULL,
			`event_place` varchar(45) DEFAULT NULL,
			`event_date` varchar(45) DEFAULT NULL,
			`event_entrance_fee` varchar(45) DEFAULT NULL,
			PRIMARY KEY (`event_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;';

		//mysqli_query($link,$sql);

		$result = $link->query($sql);
		//var_dump($result);

		$sql = "CREATE TABLE `participants` (
			`participant_id` varchar(45) NOT NULL,
			`participant_type_code` varchar(45) DEFAULT NULL,
			`participant_name` varchar(45) DEFAULT NULL,
			`participant_lastname` varchar(45) DEFAULT NULL,
			`participant_email` varchar(45) DEFAULT NULL,
			PRIMARY KEY (`participant_id`),
			KEY `participant_type_code_idx` (`participant_type_code`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

		//mysqli_query($link,$sql);
		$result = $link->query($sql);

		//var_dump($result);
		$sql = "CREATE TABLE `ref_event_types` (
  			`event_type_code` varchar(45) NOT NULL,
  			`event_description` varchar(45) NOT NULL,
 			 PRIMARY KEY (`event_type_code`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

		//mysqli_query($link,$sql);
		$result = $link->query($sql);

		$archivo = "<?php 
		define('DB_HOST', '{$DB_HOST}');
		define('DB_USER', '{$DB_USER}');
		define('DB_PASS', '{$DB_PASS}');
		define('DB_NAME', '{$DB_NAME}');
		";

		file_put_contents("inc/configx.php", $archivo);

		echo "
			<script>
				alert('Instalacion realizada');
				window.location = 'index.php';
			</script>
		";
		exit();
	} else {

	$mensaje = "Verifica tus datos de conexion";

	}
}

?>

<h2>Bienvenido al asistente de instalacion de la aplicacion</h2>

<form method="post" action="install.php">
	<div class="well well-large">

		<table >
			<tr>
				<th align="left">
					Servidor:
				</th>
				<td>
					<input type='text' name="DB_HOST" value='<?php echo $DB_HOST; ?>'>
				</td>
			</tr>
			<tr>
				<th align="left">
					Usuario:
				</th>
				<td>
					<input type='text' value='<?php echo $DB_USER;?>' name="DB_USER">
				</td>
			</tr>
			<tr>
				<th align="left">
					Contraseña:
				</th>
				<td>
					<input type='text' value='<?php echo $DB_PASS;?>' name="DB_PASS">
				</td>
			</tr>
			<tr>
				<th align="left">
					Base de Datos:
				</th>
				<td>
					<input type='text' value='<?php echo $DB_NAME;?>'name="DB_NAME">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<button class="btn btn-success" ype="submit">Continuar</button>

					<font color="red"><?php echo $mensaje; ?></font>

				</td>
			</tr>


		</table>
	</div>
</form>