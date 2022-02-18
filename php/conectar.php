<?php
session_start();
include("conexion_BD.php");

//Llamar a la función de copnexión con la BD
$link=conectar();

// Traer datos de usuario y clave del formulario
$pass=$_POST["pass"];
$email=$_POST["email"];

//Creamos la consulta SQL
$query="SELECT * FROM alumno WHERE email='".$email.
            "' AND contraseña='".md5($pass)."'";
$result=mysqli_query($link,$query);

/* Si se puede extraer una fila es que el usuario
 *  existe y la password es correcta
 */

if ($fila=mysqli_fetch_array($result)){
    $_SESSION["id_alumno"]=$fila["id"];
    header("Location:inicio.php");
}
else{
    $_SESSION["error"]="Usuario o contraseña erróneos";
    header("Location:index.php");
}

//Cierre de la conexión a la BD
mysqli_close($link);
