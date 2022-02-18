<?php 
session_start();
include("conexion_BD.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Aplicación Gestión Dual</title>
<link type="text/css" href="../include/estilo.css" rel="stylesheet" />

<!-- Bootstrap de CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    textarea {
    float:left;
   font-size:12px;
   padding:4px 2px;
   border:solid 1px #aacfe4;
   width:200px;
   margin:2px 0 20px 10px;
   resize: none
    }
    body{
			background-color: #E3D3CC;
			background: linear-gradient(to left, #F5FAFF, #C4E0FC);
		}
        .fondo{
            background-image: url(imagenes/header.jpg);
            background-position: 10% 25%;
            background-size: cover;
            height: 30vh;

        }
	

    </style>

</head>

<body>

<a class="btn btn-primary" style="position:fixed; top:0; margin:20px; color:white;" data-bs-toggle="offcanvas" href="#menu" role="button" aria-controls="offcanvasExample">
    Desplegar Menu
  </a>

  <div class="offcanvas offcanvas-start" tabindex="-1" id="menu" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Opciones</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
              <ul class="list-unstyled components">
                <li class="active">
                
            </li>
            <li>
                <a href="inicio.php" >Inicio</a>
            </li>
            <li>
                <a href="actividades.php">Actividades</a>
            </li>
            <li>
                <a href="salir.php">Cerrar sesión</a>
            </li>
        </ul>
    </div>
  </div>

<div id="wrapper">

	<div id="main">
	
	 
	
	<div id="content2">
			<div>
				<img id="alumno" src="../imagenes/user.png" style="width:10%"/>
			</div>
			<div style="margin-top:10px;">
				<p id="nombre"><b>Nombre: </b></p>
				<p id="dni"><b>DNI: </b></p>
				<p id="telefono"><b>Teléfono: </b></p>
				<p id="email"><b>Email: </b></p>
				<p id="empresa"><b>Empresa: </b></p>
				<p id="profesor"><b>Tutor: </b></p>
			</div>
	</div>
	</div>
	
	

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <script type="text/javascript" src="../scripts/validaciones.js"></script>

</body>
</html>	