<?php
session_start();
include("conexion_BD.php");


    //Conectamos con la BD
    $link=conectar();
    $_SESSION["error"]="";
    
    $fechaActual = date('Y-m-d');

    $tipo="";

    if($_POST["tipo_practica"] == "dual") {
        $tipo = "Dual";
    } else if ($_POST["tipo_practica"] == "fct") {
        $tipo = "FCT";
    } else {
        $tipo = $_POST["tipo_practica"];
    }

    $query="INSERT INTO actividades
            (alumno_id,tipo_practica,total_horas,actividad_realizada,observaciones,fecha,fecha_creacion)
            VALUES (".$_SESSION['id_alumno'].",
                    '".utf8_decode($tipo)."',
                    ".utf8_decode($_POST["horas"]).",
                    '".utf8_decode($_POST["actividad"])."',
                    '".utf8_decode($_POST["observaciones"])."',
                    '".utf8_decode($_POST["fecha"])."',
                    '".$fechaActual."')";
              
    //Ejecutar consulta
    if (mysqli_query($link,$query))
        $_SESSION["error"].="<br> Actividad grabada correctamente";
    else
        $_SESSION["error"].="<br> No se ha podido insertar la actividad";
        
    mysqli_close($link);
    
    header("location:actividades.php");
