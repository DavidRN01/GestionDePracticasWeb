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
<script type="text/javascript" src="../scripts/validaciones.js"></script>

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

    </style>

</head>

<body>
<div id="wrapper">
	
	<div id="main">
	
	<?php include("../include/navbar.php");?>
	
	<div id="content">

    <?php
    $id_actividad = htmlspecialchars($_GET["id_actividad"]);
     //Conectamos con la BD
     $link=conectar();
    
     $query="SELECT * FROM actividades WHERE id=".$id_actividad.";";
     
     //Ejecutar consulta
     $result=mysqli_query($link,$query);
     
     //Extraemos datos de la consulta del profesor
     $fila=mysqli_fetch_array($result);
     
     mysqli_close($link);
    ?>

<h2>Editar actividad</h2>
    
    <div id="stylized" class="myform">
    <form id="form" name="form" method="post" 
    	action="editarActividad.php" onsubmit="return validaractividad()"
    	enctype="multipart/form-data">
    	
    <h1>Datos de la actividad</h1>

    <label>Tipo de práctica
    	<span class="small" id="validatipo">El tipo de práctica tiene que ser FCT o dual</span>
    </label>
    <input type="text" name="tipo_practica" id="tipo_practica"
            value="<?php echo utf8_encode($fila["tipo_practica"]);?>" readonly />
    
    <label>Total de horas
    	<span class="small" id="validahoras">Total de tiempo requerido</span>
    </label>
    <input type="number" name="horas" id="horas" min="0.5" max="6" step="0.5"
            value="<?php echo utf8_encode($fila["total_horas"]);?>" readonly />
   
   <label>Actividad realizada
    	<span class="small" id="validaactividad">Nombre de actividad requerido</span>
    </label>
    <input type="text" name="actividad" id="actividad"/>
    
    <label>Observaciones</label>
    <textarea name="observaciones" rows="4" id="observaciones"></textarea>
    
    <label>Fecha</label>
    <input type="date" name="fecha" id="fecha" min='2022-03-21' max='2022-05-27'
            value="<?php echo utf8_encode($fila["fecha"]);?>"
        readonly />
    
    <input type="hidden" name="id" id="id" value="<?php echo utf8_encode($fila["id"]);?>">
    
    <button type="submit" onclick="return confirmar()">Editar</button> 
    
    <div class="spacer"></div>
    
    </form>
    
    </div>
    
    </div>
	</div>
</div>
</body>
</html>	