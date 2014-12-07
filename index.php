<?php 

$titulo = "";

include('inc/header.php');

require_once('inc/database.php');

if(!is_file("inc/configx.php")){
	echo "
	<script>
		window.location='install.php';
	</script>
	";
}
require_once('inc/configx.php');
?>

<style type="text/css">
	.profile-photo {
		display: block;
		max-width: 170px;
		margin: auto 30px;
		border-radius: 30px;  
	}


	footer {
		font-size: 0.75em;
		text-align: center;
		clear: both;
		color: #555;
	}
	footer li {
  		text-decoration: none;
	}
</style>

</div>


<div class="row">
	<div class="hero-unit">
		<div class="media">

			<img src="img/rafael.gif" class="profile-photo pull-left" data-src="holder.js/64x64">
			<div margin-left="4px" class="pull-right">
				<h1>Tarea 2</h1>
				<p>Mantenimientos simples e instalar Wordpress</p>
				<p>
					<a class="btn btn-primary btn-large" href="http://www.databaseanswers.org/data_models/just_giving_charity/just_giving_charity_physical_model.htm">
						Base de datos utilizada -Just Charity-
					</a>
				</p>
			</div>
		</div>

	</div>

	<div class="page-header">
		<h1>Cómo instalar Wordpress localmente?<small> Windows 7</small></h1>
	</div>


	<div class="hero-unit">
		<div align="center">
			<iframe  width="640" height="480" src="//www.youtube.com/embed/lPMa80PYr_0" frameborder="0" allowfullscreen>
			</iframe>
		</div>

	</div>

	<?php include'inc/footer.php';	?>
</div> <!-- /Contenedor-->

</body>
</html>