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
</head>

<body>
<div id="wrapper">
	
	<div id="main">
	
	<?php include("../include/navbar.php");?>
	
	<div id="content">

    <?php 
    //Conectamos con la BD
    $link=conectar();
    $query="SELECT * FROM actividades WHERE alumno_id=".$_SESSION['id_alumno'].";";
    
    //Ejecutar consulta
    $result=mysqli_query($link,$query);
    
    //Mostar resultados en tabla
    //Primero la fila de títulos
    ?>

<h2>Actividades</h2>
    <table>
    	<tr>
    		<th></th>
    		<th>Tipo</th>
    		<th>Horas</th>
    		<th>Actividad</th>
    		<th>Observaciones</th>
    		<th>Fecha</th>
    		<th></th>
    	</tr>
    
        <?php   

        while ($fila=mysqli_fetch_array($result)){
            echo "<tr>
                    <td><a href='editarActividadFormulario.php?id_actividad=".$fila["id"]."'>
                    <img src='../imagenes/editar.png' width='20'></a></td>
                    <td>".utf8_encode($fila['tipo_practica'])."</td>
                    <td>".utf8_encode($fila['total_horas'])."</td>
                    <td>".utf8_encode($fila['actividad_realizada'])."</td>
                    <td>".utf8_encode($fila['observaciones'])."</td>
                    <td>".utf8_encode($fila['fecha'])."</td>
                    <td><a onclick='return confirmar()'
                        href='borrarActividad.php?id_actividad=".$fila["id"]."'>
                    <img src='../imagenes/eliminar.gif' width='20'></a></td>
                </tr>";
        }
        
        mysqli_close($link);
        ?>

    </table>

<div id="centrado">
	<form id="form1" name="form1" method="post"
 		action="insertarActividadFormulario.php">
 		<input type="submit" name="enviar" id="enviar" value="Insertar actividades"/>
 	</form>
</div>

<?php 
if(isset($_SESSION["error"])){
    echo "<div id='mensaje'>".$_SESSION["error"]."</div>";
    unset($_SESSION["error"]);
}

?>

	</div>
	</div>
	
</div>
</body>
</html>	