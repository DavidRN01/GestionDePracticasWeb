<?php
session_start();
include("conexion_BD.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Aplicación Gestión Dual</title>
    <link type="text/css" href="../include/prueba.css" rel="stylesheet" />
    <link type="text/css" href="../include/estilo.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabla').DataTable();
        });
    </script>

</head>

<body>

    <?php
    //Conectamos con la BD
    $link = conectar();
    $query = "SELECT * FROM actividades WHERE alumno_id=" . $_SESSION['id_alumno'] . ";";

    //Ejecutar consulta
    $result = mysqli_query($link, $query);

    //Mostar resultados en tabla
    //Primero la fila de títulos
    ?>


    <style>
        a:link {
            text-decoration: none !important;
            font-family: "Arial", sans-serif;
            font-weight: bold;
            color: #000;
        }

        body {
            background: #F5FAFF;
            background: -webkit-linear-gradient(right, #F5FAFF, #C4E0FC);
            background: -moz-linear-gradient(right, #F5FAFF, #C4E0FC);
            background: linear-gradient(to left, #F5FAFF, #C4E0FC);
        }
    </style>

    <div id="wrapper">

        <div id="main ">
            <div class="container w-75 mt-5 ">
                <div class="row align-items-stretch">
                    <div id="content">

                        <h2>Actividades</h2>
                        <table id="tabla" class="display">
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

                            while ($fila = mysqli_fetch_array($result)) {
                                echo "<tr>
                    <td><a href='editarActividadFormulario.php?id_actividad=" . $fila["id"] . "'>
                    <img src='../imagenes/editar.png' width='20'></a></td>
                    <td>" . utf8_encode($fila['tipo_practica']) . "</td>
                    <td>" . utf8_encode($fila['total_horas']) . "</td>
                    <td>" . utf8_encode($fila['actividad_realizada']) . "</td>
                    <td>" . utf8_encode($fila['observaciones']) . "</td>
                    <td>" . utf8_encode($fila['fecha']) . "</td>
                    <td><a onclick='return confirmar()'
                        href='borrarActividad.php?id_actividad=" . $fila["id"] . "'>
                    <img src='../imagenes/eliminar.gif' width='20'></a></td>
                </tr>";
                            }

                            mysqli_close($link);
                            ?>

                        </table>

                        <div id="centrado">
                            <form id="form1" name="form1" method="post" action="insertarActividadFormulario.php">
                                <input type="submit" name="enviar" id="enviar" value="Insertar actividades" />
                            </form>
                        </div>

                        <?php
                        if (isset($_SESSION["error"])) {
                            echo "<div id='mensaje'>" . $_SESSION["error"] . "</div>";
                            unset($_SESSION["error"]);
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


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
                    <a href="inicio.php">Inicio</a>
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