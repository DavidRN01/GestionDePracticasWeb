<?php
session_start();
include("conexion_BD.php");

    //Conectamos con la BD
    $link=conectar();
    
    $query="DELETE FROM actividades WHERE id=".$_GET["id_actividad"];
            
    
    //Ejecutar consulta
   if (mysqli_query($link,$query))
       $_SESSION["error"]="Actividad borrada correctamente";
   else
       $_SESSION["error"]="No se ha podido borrar la actividad";
        
    mysqli_close($link);
    
    header("location:actividades.php");
