<?php
session_start();
include("conexion_BD.php");

    //Conectamos con la BD
    $link=conectar();
    
    $query="UPDATE actividades 
            SET actividad_realizada='".utf8_decode($_POST["actividad"])."',
            observaciones='".utf8_decode($_POST["observaciones"])."'
            WHERE id=".$_POST["id"].";";
    
    //Ejecutar consulta
   if (mysqli_query($link,$query))
       $_SESSION["error"]="Actividad modificada correctamente";
   else
       $_SESSION["error"]="No se han podido actualizar los datos de la actividad";
        
    mysqli_close($link);
    
    header("location:actividades.php");
 ?>