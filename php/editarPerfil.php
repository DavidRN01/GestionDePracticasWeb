<?php
session_start();
include("conexion_BD.php");

    //Conectamos con la BD
    $link=conectar();
    
    $query="UPDATE alumno 
            SET email='".utf8_decode($_POST["email"])."',
            contraseña='".md5($_POST["password"])."'
            WHERE id=".$_SESSION["id_alumno"].";";
    
    //Ejecutar consulta
   if (mysqli_query($link,$query))
       $_SESSION["error"]="Perfil modificado correctamente";
   else
       $_SESSION["error"]="No se han podido actualizar los datos del perfil";
        
    mysqli_close($link);
    
    header("location:inicio.php");
