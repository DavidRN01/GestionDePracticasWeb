<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aplicación Gestión Dual</title>
	<link type="text/css" href="../include/estilo.css" rel="stylesheet" />

	<!-- Bootstrap de CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<style>
		body {
			/*background-color: #E3D3CC;*/
			/*background-image: linear-gradient(to right, #E3D3CC 0%, #FAF4EF 74%);*/
		}

		.fondo {
			background-image: url(../imagenes/hombre.jpg);
			background-position: center center;
			background-size: cover;
			height: 75vh;

		}
	</style>
</head>
<body>

<div class="container w-75 mt-5 rounded shadow ">
	<div class="row align-items-stretch ">

		<!--- Esto es para el fondo y los resize --->
		<div class="col fondo d-none d-lg-block col-md-5 col-lg-5 col-xl-6">

		</div>
		<div class="col">

			<h2 class="fw-bold text-center py-5">Bienvenido</h2>

			<!--- LOGIN --->
			<form id="form" method="post" name="form" action="conectar.php">
				<div class="mb-4">
					<!--- Email --->
					<label for="email" class="form-label">Correo</label>
					<input type="email" class="form-control" name="email" id="email"></label>
				</div>
				<!--- Contraseña --->
				<div class="mb-4">
					<label for="password" class="form-label">Contraseña</label>
					<input type="password" class="form-control" name="pass" id="pass" size="50"></label>
				</div>
				<!--- Inicio --->
				<div class="d-grid">
					<button type="submit" class="btn btn-primary">Iniciar Sesión</button>
				</div>

				<!--- Recordar --->
				<div class="mb-4 form-check">
					<input type="checkbox" name="connected" class="form-check-input">
					<label for="connected" class="form-check-label">Recordar usuario</label>
				</div>

			</form>
		</div>
	</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


</body>




<?php
if (isset($_SESSION["error"])) {
	echo "<div id='error'>" . $_SESSION["error"] . "</div>";
	unset($_SESSION["error"]);
}

?>
</div>